<?php


namespace App\Http\Requests\Railway;

use App\Models\SaleRailwayStation;
use App\ViewModels\Sale\Railway\Buy\BlankForm;
use App\ViewModels\Sale\Railway\Buy\BuyDirectionForm;
use App\ViewModels\Sale\Railway\Buy\BuyForm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;

class BuyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'item' => 'array:name',
        ];

        $rules['blanks.*.discount'] = 'required_if:blanks.*.useDiscount, 1';

        //$rules['blanks.*.tariffType'] = 'required';
        $rules['blanks.*.documentType'] = 'required_with:blanks.*.tariffType';
        $rules['blanks.*.document'] = 'required_with:blanks.*.tariffType';
        $rules['blanks.*.surname'] = 'required_with:blanks.*.tariffType';
        $rules['blanks.*.name'] = 'required_with:blanks.*.tariffType';
        $rules['blanks.*.citizenship'] = 'required_with:blanks.*.tariffType';
        $rules['blanks.*.phone'] = 'required_with:blanks.*.tariffType';

        //$rules['blanks.*.birthday'] = 'required_if:blanks.*.tariffType, 1';

        $rules['blanks.*.passengerIin'] = 'required_if:blanks.*.documentType, 0';
        $rules['blanks.*.passengerIin'] = 'required_if:blanks.*.documentType, 5 && required_if:blanks.*.citizenship, "KAZ"';		
        //$rules['blanks.*.passengerIin'] = 'required_if:blanks.*.citizenship, "KAZ"';		
        //$rules['blanks.*.passengerIin'] = 'required_if:';
        //$rules['blanks.*.passengerIin'] = 'required_with:blanks.*.tariffType, 1, blanks.*.tariffType, 0, blanks.*.passengerIinEnabled, null';
        /*$rules['blanks.*.passengerIin'] = [
            Rule::requiredIf(function () {
                var_dump($this->input('blanks.*.index'));
                var_dump($this->input('blanks.*.tariffType'));exit;
                return in_array($this->input('blanks.*.tariffType'), ["0", "1"]) && $this->boolean('passengerIinEnabled') != true;
            })
        ];*/


        $rules['blanks.*.birthday'] = [
            'required_if:blanks.*.tariffType, 1',
            Rule::requiredIf(function () {
                return in_array(1, $this->input('buy_form.*.isObligativeElReg'));
            })
        ];

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'blanks.*.required' => 'Заполните',
            'blanks.*.required_with' => 'Заполните'
        ];
    }

    /**
     * @return BuyForm
     */
    public function getData() : BuyForm{
        $buyForm = new BuyForm();



        if($this->isMethod($this::METHOD_POST)){
            $direction = new BuyDirectionForm();
            $direction->setDepartureStation($this->input('buy_form.forwardDirection.departureStation'));
            $direction->setArrivalStation($this->input('buy_form.forwardDirection.arrivalStation'));
            $direction->setDepartureDatetime($this->date('buy_form.forwardDirection.departureDatetime'));
            $direction->setTrain($this->input('buy_form.forwardDirection.train'));
            $direction->setCarType($this->input('buy_form.forwardDirection.car.type'));
            $direction->setCarNumber($this->input('buy_form.forwardDirection.car.number'));
            $direction->setCarService($this->input('buy_form.forwardDirection.car.service'));
            $direction->setWithoutBedding($this->boolean('buy_form.forwardDirection.withoutBedding'));
            $direction->setSeatsComp($this->boolean('buy_form.forwardDirection.seatsComp', false) == true ? 0 : null);
            $direction->setUpDownSlider($this->input('buy_form.forwardDirection.upDownSlider'));
            $direction->setTimeInWay($this->input('buy_form.forwardDirection.timeInWay'));
            $direction->setIsObligativeElReg($this->input('buy_form.forwardDirection.isObligativeElReg'));
            $seats = $this->input('buy_form.forwardDirection.seats');
            $direction->setSeats($seats);
            $direction->setCreditCard($this->boolean('buy_form.forwardDirection.creditCard'));			

            $buyForm->setForwardDirection($direction);

            if($this->input('buy_form.backwardDirection.train') != null){
                $backwardDirection = new BuyDirectionForm();
                $backwardDirection->setDepartureStation($this->input('buy_form.backwardDirection.departureStation'));
                $backwardDirection->setArrivalStation($this->input('buy_form.backwardDirection.arrivalStation'));
                $backwardDirection->setDepartureDatetime($this->date('buy_form.backwardDirection.departureDatetime'));
                $backwardDirection->setTrain($this->input('buy_form.backwardDirection.train'));
                $backwardDirection->setCarType($this->input('buy_form.backwardDirection.car.type'));
                $backwardDirection->setCarNumber($this->input('buy_form.backwardDirection.car.number'));
                $backwardDirection->setCarService($this->input('buy_form.backwardDirection.car.service'));
                $backwardDirection->setWithoutBedding($this->boolean('buy_form.backwardDirection.withoutBedding'));
                $backwardDirection->setSeatsComp($this->boolean('buy_form.backwardDirection.seatsComp', false) == true ? 0 : null);
                $backwardDirection->setUpDownSlider($this->input('buy_form.backwardDirection.upDownSlider'));
                $backwardDirection->setTimeInWay($this->input('buy_form.backwardDirection.timeInWay'));
                $backwardDirection->setIsObligativeElReg($this->input('buy_form.backwardDirection.isObligativeElReg'));
                $seats = $this->input('buy_form.backwardDirection.seats');
                $backwardDirection->setSeats($seats);
				$backwardDirection->setCreditCard($this->boolean('buy_form.backwardDirection.creditCard'));					

                $buyForm->setBackwardDirection($backwardDirection);
            }

            $blanks = [];
            foreach ($this->get('blanks') as $k=>$blankA){
                $blank = new BlankForm();


                $blank->setUseDiscount($this->boolean('blanks.'.$k.'.useDiscount'));
                $blank->setDiscount($this->boolean('blanks.'.$k.'.discount'));
                $blank->setPassengerIin($this->input('blanks.'.$k.'.passengerIin'));
                $blank->setTariffType($this->input('blanks.'.$k.'.tariffType'));
                $blank->setDocumentType($this->input('blanks.'.$k.'.documentType'));
                $blank->setDocument($this->input('blanks.'.$k.'.document'));
                $blank->setSurname($this->input('blanks.'.$k.'.surname'));
                $blank->setName($this->input('blanks.'.$k.'.name'));
                $blank->setLastName($this->input('blanks.'.$k.'.lastName'));
                $blank->setBirthday($this->date('blanks.'.$k.'.birthday'));
                $blank->setSex(intval($this->input('blanks.'.$k.'.sex')));
                $blank->setPhone($this->input('blanks.'.$k.'.phone'));
                $blank->setWithoutPlace($this->boolean('blanks.'.$k.'.withoutPlace'));
                $blank->setCitizenship($this->input('blanks.'.$k.'.citizenship'));
                $blank->setIsInvalidOptionEnabled($this->boolean('blanks.'.$k.'.isInvalidOptionEnabled'));
                $blank->setIin($this->input('blanks.'.$k.'.iin'));
                $blank->setCode($this->input('blanks.'.$k.'.code'));
                $blank->setDisabilityCard($this->input('blanks.'.$k.'.disabilityCard'));
                $blank->setConsentCPPD($this->boolean('blanks.'.$k.'.consentCPPD'));
                $blank->setSavePassenger($this->boolean('blanks.'.$k.'.savePassenger'));


                /*$blank->setDiscount(isset($blankA['discount']) ? $blankA['discount'] : '');
                $blank->setPassengerIin($blankA['passengerIin']);
                $blank->setTariffType($blankA['tariffType']);
                $blank->setDocumentType($blankA['documentType']);
                $blank->setDocument($blankA['document']);
                $blank->setSurname($blankA['surname']);
                $blank->setName($blankA['name']);
                $blank->setLastName($blankA['lastName']);
                $blank->setSex(intval($blankA['sex']));
                $blank->setPhone($blankA['phone']);
                $blank->setWithoutPlace($blankA['withoutPlace']);
                $blank->setIin($blankA['iin']);
                $blank->setCode($blankA['code']);
                $blank->setDisabilityCard($blankA['disabilityCard']);*/

                $blanks[] = $blank;
            }


            $buyForm->setBlanks($blanks);
        }else{
            $direction = new BuyDirectionForm();
            $direction->setDepartureStation($this->input('buy_form_contract.forwardDirection.departureStation'));
            $direction->setArrivalStation($this->input('buy_form_contract.forwardDirection.arrivalStation'));
            $direction->setDepartureDatetime($this->date('buy_form_contract.forwardDirection.departureDatetime'));
            $direction->setTrain($this->input('buy_form_contract.forwardDirection.train'));
            $direction->setCarType($this->input('buy_form_contract.forwardDirection.car.type'));
            $direction->setCarNumber($this->input('buy_form_contract.forwardDirection.car.number'));
            $direction->setCarService($this->input('buy_form_contract.forwardDirection.car.service'));
            $direction->setWithoutBedding($this->boolean('buy_form_contract.forwardDirection.withoutBedding'));
            $direction->setSeatsComp($this->boolean('buy_form_contract.forwardDirection.seatsComp'));
            $direction->setTimeInWay($this->input('buy_form_contract.forwardDirection.timeInWay'));
            $direction->setIsObligativeElReg($this->input('buy_form_contract.forwardDirection.isObligativeElReg'));
            $seats = $this->input('buy_form_contract.forwardDirection.seats');
            $direction->setSeats($seats);
            $direction->setCreditCard($this->boolean('buy_form.forwardDirection.creditCard'));		

            $direction->setAddSigns($this->input('buy_form_contract.forwardDirection.addSigns'));				

            $buyForm->setForwardDirection($direction);

            if($this->input('buy_form_contract.backwardDirection.train') != null){
                $backwardDirection = new BuyDirectionForm();
                $backwardDirection->setDepartureStation($this->input('buy_form_contract.backwardDirection.departureStation'));
                $backwardDirection->setArrivalStation($this->input('buy_form_contract.backwardDirection.arrivalStation'));
                $backwardDirection->setDepartureDatetime($this->date('buy_form_contract.backwardDirection.departureDatetime'));
                $backwardDirection->setTrain($this->input('buy_form_contract.backwardDirection.train'));
                $backwardDirection->setCarType($this->input('buy_form_contract.backwardDirection.car.type'));
                $backwardDirection->setCarNumber($this->input('buy_form_contract.backwardDirection.car.number'));
                $backwardDirection->setCarService($this->input('buy_form_contract.backwardDirection.car.service'));
                $backwardDirection->setWithoutBedding($this->boolean('buy_form_contract.backwardDirection.withoutBedding'));
                $backwardDirection->setSeatsComp($this->boolean('buy_form_contract.backwardDirection.seatsComp'));
                $backwardDirection->setTimeInWay($this->input('buy_form_contract.backwardDirection.timeInWay'));
                $backwardDirection->setIsObligativeElReg($this->input('buy_form_contract.backwardDirection.isObligativeElReg'));
                $seatsB = $this->input('buy_form_contract.backwardDirection.seats');
                $backwardDirection->setSeats($seatsB);
				$backwardDirection->setCreditCard($this->boolean('buy_form.backwardDirection.creditCard'));		

				$backwardDirection->setAddSigns($this->input('buy_form_contract.backwardDirection.addSigns'));					

                $buyForm->setBackwardDirection($backwardDirection);
            }


            $blanks = [];
            if(old('blanks', false) !== false){
                $blanks = old('blanks', []);

            }else{
				if (is_array($seats) || is_object($seats))
				{
					foreach ($seats as $seat){
						$blanks[] = new BlankForm();
					}
				}
				else 
				{
					$sess = 0;
					if (Session::has('NoSeats'))
					{
						$sess = Session::get('NoSeats');
					}
					if ($sess == 1)
					{						
						$blanks[] = new BlankForm();
					}
					else
					{
						foreach ($seats as $seat){
							$blanks[] = new BlankForm();
						}						
					}
				}
            }

            $buyForm->setBlanks($blanks);
        }

        return $buyForm;
    }

    public function getIsObligativeElReg(){
        if($this->isMethod($this::METHOD_POST)){
            return $this->input("buy_form.forwardDirection.isObligativeElReg") == 1;
        }else{
            return $this->input("buy_form_contract.forwardDirection.isObligativeElReg") == 1;
        }
    }

    protected function findStationByCode(string $code){
        return SaleRailwayStation::where('station_code', '=', $code)->first();
    }
}
