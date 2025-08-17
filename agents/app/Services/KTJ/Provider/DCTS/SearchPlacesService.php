<?php


namespace App\Services\KTJ\Provider\DCTS;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route\TrainRouteResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\CarSearchResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\TrainSearchResponse;
use App\Services\KTJ\KTJService;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\SerializerInterface;

class SearchPlacesService
{
    /**
     * @var null | KTJService
     */
    protected $KTJService = null;

    /** @var SerializerInterface */
    protected $serializer;

    /**
     * @var string
     */
    protected $searchUri;
    /**
     * @var string
     */
    protected $searchCarsUri;
    /**
     * @var null|string $routeUri
     */
    protected $routeUri;

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function searchAuthorized( IRequest $searchRequest ): ?IResponse {
        try
        {
            return $this->search( $searchRequest );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->KTJService->refreshProviderCookies();

                    return $this->search( $searchRequest );
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws GuzzleException
     */
    function search( IRequest $searchRequest ): ?IResponse {

        $psrResponse = $this->KTJService->getDctsClient()->request( 'post', $this->searchUri, [
            'cookies' => $this->KTJService->loadDCTSPCookies(),
            'headers' => ['asas'=>'1'],
            'body'    => $this->getSerializer()->serialize( $searchRequest, 'json' )
        ] );

        $psrResponse->getBody()->rewind();

        $content = <<<EOT
{
	"ShowWithoutPlaces": false,
	"ForwardDirection": {
		"PassRouteFrom": "АЛМАТЫ",
		"PassRouteTo": "НУР-СУЛТАН",
		"PassRouteCodeFrom": "2700000",
		"PassRouteCodeTo": "2708001",
		"NotAllTrains": false,
		"Trains": [
			{
				"Date": "2023-03-29T00:00:00",
				"TrainsCollection": [
					{
						"Number": "015Т",
						"Number2": "015Т",
						"Type": "СК",
						"Route": [
							"АЛМАТЫ 2",
							"ПЕТРОПАВЛ"
						],
						"DepartureDateTime": "2023-03-29T12:00:00",
						"DepartureStop": null,
						"ArrivalDateTime": "2023-03-30T10:13:00",
						"ArrivalStop": "00:30:00",
						"TimeInWay": "22:13:00",
						"ElRegPossible": true,
						"Brand": null,
						"FirmName": null,
						"IsWithoutPassengerInfo": false,
						"TrainDetail": {
							"IsTransit": false,
							"IsWithoutElReg": false,
							"IsObligativeElReg": false,
							"IsInternetTransit": false,
							"IsInterstate": false
						},
						"Comments": [],
						"Cars": [
							{
								"Type": 3,
								"FreeSeats": 37,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 0,
									"SeatsUp": 10,
									"SeatsLateralDn": 0,
									"SeatsLateralUp": 27,
									"FreeComp": 0
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "3Л",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 5313.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 0,
											"SeatsUp": 10,
											"SeatsLateralDn": 0,
											"SeatsLateralUp": 27,
											"FreeComp": 0
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 4,
								"FreeSeats": 51,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 0,
									"SeatsUp": 51,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 0
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2К",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 7990.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 0,
											"SeatsUp": 2,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 0
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "2У",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 7990.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 0,
											"SeatsUp": 49,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 0
										},
										"BoardingForm": 0
									}
								]
							}
						],
						"ArrivalDiffTime": 0,
						"DepartureDiffTime": 0,
						"DepartureLocalDateTime": "2023-03-29T12:00:00",
						"ArrivalLocalDateTime": "2023-03-30T10:13:00",
						"ShowLocalDepartureTime": false,
						"ShowLocalArrivalTime": false,
						"IsTarifficated": false
					},
					{
						"Number": "003Ц",
						"Number2": "003Ц",
						"Type": "СК",
						"Route": [
							"АЛМАТЫ 2",
							"НУРЛЫ ЖОЛ"
						],
						"DepartureDateTime": "2023-03-29T13:28:00",
						"DepartureStop": null,
						"ArrivalDateTime": "2023-03-30T05:20:00",
						"ArrivalStop": null,
						"TimeInWay": "15:52:00",
						"ElRegPossible": true,
						"Brand": null,
						"FirmName": null,
						"IsWithoutPassengerInfo": false,
						"TrainDetail": {
							"IsTransit": false,
							"IsWithoutElReg": false,
							"IsObligativeElReg": false,
							"IsInternetTransit": false,
							"IsInterstate": false
						},
						"Comments": [],
						"Cars": [
							{
								"Type": 2,
								"FreeSeats": 63,
								"Seats": {
									"SeatsUndef": 63,
									"SeatsDn": null,
									"SeatsUp": null,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": null
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2С",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 5323.0,
										"TariffValue2": null,
										"TariffService": null,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": 63,
											"SeatsDn": null,
											"SeatsUp": null,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": null
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 4,
								"FreeSeats": 236,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 103,
									"SeatsUp": 133,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 43
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2Д",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 13533.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 103,
											"SeatsUp": 133,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 43
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 6,
								"FreeSeats": 13,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 6,
									"SeatsUp": 7,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 6
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "1Б",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": "У0",
										"TariffValue": 21733.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 6,
											"SeatsUp": 7,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 6
										},
										"BoardingForm": 0
									}
								]
							}
						],
						"ArrivalDiffTime": 0,
						"DepartureDiffTime": 0,
						"DepartureLocalDateTime": "2023-03-29T13:28:00",
						"ArrivalLocalDateTime": "2023-03-30T05:20:00",
						"ShowLocalDepartureTime": false,
						"ShowLocalArrivalTime": false,
						"IsTarifficated": false
					},
					{
						"Number": "105Т",
						"Number2": "105Т",
						"Type": "СК",
						"Route": [
							"АЛМАТЫ 2",
							"ПЕТРОПАВЛ"
						],
						"DepartureDateTime": "2023-03-29T15:44:00",
						"DepartureStop": null,
						"ArrivalDateTime": "2023-03-30T06:15:00",
						"ArrivalStop": "00:15:00",
						"TimeInWay": "14:31:00",
						"ElRegPossible": true,
						"Brand": null,
						"FirmName": null,
						"IsWithoutPassengerInfo": false,
						"TrainDetail": {
							"IsTransit": false,
							"IsWithoutElReg": false,
							"IsObligativeElReg": false,
							"IsInternetTransit": false,
							"IsInterstate": false
						},
						"Comments": [],
						"Cars": [
							{
								"Type": 4,
								"FreeSeats": 218,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 95,
									"SeatsUp": 123,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 43
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2Б",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": "У0",
										"TariffValue": 24606.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 0,
											"SeatsUp": 2,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 0
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "2Д",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 16463.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 95,
											"SeatsUp": 121,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 43
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 6,
								"FreeSeats": 14,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 6,
									"SeatsUp": 8,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 6
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "1Б",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": "У0",
										"TariffValue": 24067.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 3,
											"SeatsUp": 5,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 3
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "1Э",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": "У0",
										"TariffValue": 28137.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 3,
											"SeatsUp": 3,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 3
										},
										"BoardingForm": 0
									}
								]
							}
						],
						"ArrivalDiffTime": 0,
						"DepartureDiffTime": 0,
						"DepartureLocalDateTime": "2023-03-29T15:44:00",
						"ArrivalLocalDateTime": "2023-03-30T06:15:00",
						"ShowLocalDepartureTime": false,
						"ShowLocalArrivalTime": false,
						"IsTarifficated": false
					},
					{
						"Number": "043Т",
						"Number2": "043Т",
						"Type": "СК",
						"Route": [
							"АЛМАТЫ 1",
							"КОСТАНАЙ"
						],
						"DepartureDateTime": "2023-03-29T16:50:00",
						"DepartureStop": null,
						"ArrivalDateTime": "2023-03-30T16:18:00",
						"ArrivalStop": "00:28:00",
						"TimeInWay": "23:28:00",
						"ElRegPossible": true,
						"Brand": null,
						"FirmName": null,
						"IsWithoutPassengerInfo": false,
						"TrainDetail": {
							"IsTransit": false,
							"IsWithoutElReg": false,
							"IsObligativeElReg": false,
							"IsInternetTransit": false,
							"IsInterstate": false
						},
						"Comments": [],
						"Cars": [
							{
								"Type": 3,
								"FreeSeats": 130,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 1,
									"SeatsUp": 68,
									"SeatsLateralDn": 22,
									"SeatsLateralUp": 39,
									"FreeComp": 0
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "3Л",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 5992.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 0,
											"SeatsUp": 60,
											"SeatsLateralDn": 22,
											"SeatsLateralUp": 32,
											"FreeComp": 0
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "3П",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 5992.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 1,
											"SeatsUp": 8,
											"SeatsLateralDn": 0,
											"SeatsLateralUp": 7,
											"FreeComp": 0
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 4,
								"FreeSeats": 216,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 91,
									"SeatsUp": 125,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 41
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2К",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 9066.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 2,
											"SeatsUp": 16,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 0
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "2Л",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 9066.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 39,
											"SeatsUp": 48,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 18
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "2У",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 9066.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 41,
											"SeatsUp": 50,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 20
										},
										"BoardingForm": 0
									},
									{
										"ClassService": {
											"Type": "2У",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 9066.0,
										"TariffValue2": null,
										"TariffService": 750.0,
										"Carrier": {
											"Name": "ТУРСИБ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 9,
											"SeatsUp": 11,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 3
										},
										"BoardingForm": 0
									}
								]
							}
						],
						"ArrivalDiffTime": 0,
						"DepartureDiffTime": 0,
						"DepartureLocalDateTime": "2023-03-29T16:50:00",
						"ArrivalLocalDateTime": "2023-03-30T16:18:00",
						"ShowLocalDepartureTime": false,
						"ShowLocalArrivalTime": false,
						"IsTarifficated": false
					},
					{
						"Number": "009Т",
						"Number2": "009Т",
						"Type": "СК ФИРМ",
						"Route": [
							"АЛМАТЫ 1",
							"НУР-СУЛТАН1"
						],
						"DepartureDateTime": "2023-03-29T19:09:00",
						"DepartureStop": null,
						"ArrivalDateTime": "2023-03-30T14:16:00",
						"ArrivalStop": null,
						"TimeInWay": "19:07:00",
						"ElRegPossible": true,
						"Brand": null,
						"FirmName": null,
						"IsWithoutPassengerInfo": false,
						"TrainDetail": {
							"IsTransit": false,
							"IsWithoutElReg": false,
							"IsObligativeElReg": false,
							"IsInternetTransit": false,
							"IsInterstate": false
						},
						"Comments": [],
						"Cars": [
							{
								"Type": 3,
								"FreeSeats": 154,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 29,
									"SeatsUp": 66,
									"SeatsLateralDn": 28,
									"SeatsLateralUp": 31,
									"FreeComp": 9
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "3П",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 10784.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 29,
											"SeatsUp": 66,
											"SeatsLateralDn": 28,
											"SeatsLateralUp": 31,
											"FreeComp": 9
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 4,
								"FreeSeats": 74,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 28,
									"SeatsUp": 46,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 10
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2К",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 17459.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 28,
											"SeatsUp": 46,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 10
										},
										"BoardingForm": 0
									}
								]
							}
						],
						"ArrivalDiffTime": 0,
						"DepartureDiffTime": 0,
						"DepartureLocalDateTime": "2023-03-29T19:09:00",
						"ArrivalLocalDateTime": "2023-03-30T14:16:00",
						"ShowLocalDepartureTime": false,
						"ShowLocalArrivalTime": false,
						"IsTarifficated": false
					},
					{
						"Number": "051Х",
						"Number2": "051Х",
						"Type": "СК",
						"Route": [
							"АЛМАТЫ 2",
							"УРАЛЬСК"
						],
						"DepartureDateTime": "2023-03-29T20:27:00",
						"DepartureStop": null,
						"ArrivalDateTime": "2023-03-30T11:00:00",
						"ArrivalStop": "00:20:00",
						"TimeInWay": "14:33:00",
						"ElRegPossible": true,
						"Brand": null,
						"FirmName": null,
						"IsWithoutPassengerInfo": false,
						"TrainDetail": {
							"IsTransit": false,
							"IsWithoutElReg": false,
							"IsObligativeElReg": false,
							"IsInternetTransit": false,
							"IsInterstate": false
						},
						"Comments": [],
						"Cars": [
							{
								"Type": 4,
								"FreeSeats": 92,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 16,
									"SeatsUp": 76,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 5
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "2Д",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": null,
										"TariffValue": 17250.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 16,
											"SeatsUp": 76,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 5
										},
										"BoardingForm": 0
									}
								]
							},
							{
								"Type": 6,
								"FreeSeats": 4,
								"Seats": {
									"SeatsUndef": null,
									"SeatsDn": 0,
									"SeatsUp": 4,
									"SeatsLateralDn": null,
									"SeatsLateralUp": null,
									"FreeComp": 0
								},
								"Tariffs": [
									{
										"ClassService": {
											"Type": "1Б",
											"Value": null
										},
										"ClassServiceInt": null,
										"AddSigns": "У0",
										"TariffValue": 20912.0,
										"TariffValue2": null,
										"TariffService": 705.0,
										"Carrier": {
											"Name": "КТЖ"
										},
										"Owner": {
											"Type": "КЗХ/КЗХ",
											"Country": {
												"Code": "27",
												"Name": "КАЗАХСТАН"
											},
											"Railway": {
												"Code": "68",
												"Name": "КАЗАХСТАНСКАЯ"
											}
										},
										"SaleLimitation": 0,
										"ElRegPossible": {
											"UK": false,
											"AKP": false
										},
										"Seats": {
											"SeatsUndef": null,
											"SeatsDn": 0,
											"SeatsUp": 4,
											"SeatsLateralDn": null,
											"SeatsLateralUp": null,
											"FreeComp": 0
										},
										"BoardingForm": 0
									}
								]
							}
						],
						"ArrivalDiffTime": 0,
						"DepartureDiffTime": 0,
						"DepartureLocalDateTime": "2023-03-29T20:27:00",
						"ArrivalLocalDateTime": "2023-03-30T11:00:00",
						"ShowLocalDepartureTime": false,
						"ShowLocalArrivalTime": false,
						"IsTarifficated": false
					}
				]
			}
		]
	},
	"BackwardDirection": null
}

EOT;



        /** @var TrainSearchResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            //$content,
            TrainSearchResponse::class,
            'json'
        );

        return $response;
    }


    /**
     * @param IRequest $searchRequest
     *
     * @return IResponse|null
     * @throws GuzzleException
     */
    function searchCarsAuthorized( IRequest $searchRequest ): ?IResponse {
        try
        {
            return $this->searchCars( $searchRequest );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->searchCars( $searchRequest );
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param IRequest $searchRequest
     *
     * @return IResponse|null
     * @throws GuzzleException
     */
    function searchCars( IRequest $searchRequest ): ?IResponse {


        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->searchCarsUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body'    => $this->getSerializer()->serialize( $searchRequest, 'json' )
        ] );


        $content = <<<EOT
{"ShowWithoutPlaces":false,"ForwardDirectionDto":{"Type":0,"PassRoute":{"From":"НУР-СУЛТАН","To":"АЛМАТЫ","CodeFrom":"2708001","CodeTo":"2700000"},"Trains":[{"Date":"2023-03-31T00:00:00","Train":{"Number":"016Т","Number2":"016Т","Type":"СК","Route":["ПЕТРОПАВЛ","АЛМАТЫ 2"],"Departure":{"Time":"06:18:00","Stop":"00:26:00","DiffTime":0,"LocalDate":"2023-03-31T00:00:00","LocalTime":"06:18:00"},"Arrival":{"Date":"2023-04-01T00:00:00","Time":"04:10:00","Stop":null,"DiffTime":0,"LocalDate":"2023-04-01T00:00:00","LocalTime":"04:10:00"},"TimeInWay":"21:52:00","DepTrain":null,"Distance":0,"ElRegPossible":true,"Brand":null,"FirmName":null,"Comments":[],"Cars":[{"Type":"Купе","TrainLetter":"Т","CarServiceType":"Т Купе","ClassService":{"Type":"2У","Value":null},"ClassServiceInt":null,"AddSigns":null,"Tariff":7990.0,"Tariff2":null,"TariffService":750.0,"Carrier":{"Name":"ТУРСИБ"},"Owner":{"Type":"КЗХ/КЗХ","Country":{"Code":"27","Name":"КАЗАХСТАН"},"Railway":{"Code":"68","Name":"КАЗАХСТАНСКАЯ"}},"SaleLimitation":0,"Cars":[{"Number":"09","SubType":"66К","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":9,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["002","014","016","018","020","024","028","034","036"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":true,"EcoFriendlyToilets":false},{"Number":"10","SubType":"66К","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":14,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["002","004","006","008","010","012","014","016","018","020","022","024","030","032"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":true,"EcoFriendlyToilets":false},{"Number":"11","SubType":"66К","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":13,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["008","010","012","014","016","018","020","022","028","030","032","034","036"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":true,"EcoFriendlyToilets":false},{"Number":"11","SubType":"66К","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":2,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["033","035"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":true,"EcoFriendlyToilets":false}]},{"Type":"Плацкартный","TrainLetter":"Т","CarServiceType":"Т Плацкартный","ClassService":{"Type":"3Л","Value":null},"ClassServiceInt":null,"AddSigns":null,"Tariff":5313.0,"Tariff2":null,"TariffService":750.0,"Carrier":{"Name":"ТУРСИБ"},"Owner":{"Type":"КЗХ/КЗХ","Country":{"Code":"27","Name":"КАЗАХСТАН"},"Railway":{"Code":"68","Name":"КАЗАХСТАНСКАЯ"}},"SaleLimitation":0,"Cars":[{"Number":"01","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":7,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":4,"Places":["039","041","043","045","047","049","051"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"01","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":7,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":2,"Places":["040","042","044","046","048","050","052"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"01","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":10,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["002","004","018","022","024","026","028","030","034","036"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"01","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":1,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["035"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"02","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":8,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":4,"Places":["037","039","041","043","045","047","049","051"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"02","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":8,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":2,"Places":["038","040","042","044","046","048","050","052"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"02","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":15,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["004","006","008","010","012","014","016","018","020","026","028","030","032","034","036"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"02","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":2,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["033","035"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"03","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":7,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":4,"Places":["037","039","041","043","045","049","051"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"03","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":8,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":2,"Places":["038","040","042","044","046","048","050","052"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"03","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":16,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["002","004","006","008","010","012","014","018","020","022","024","026","030","032","034","036"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"03","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":2,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["033","035"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"04","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":1,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":4,"Places":["045"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"04","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":3,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":2,"Places":["046","050","052"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false},{"Number":"04","SubType":"41П","ElRegPossible":{"UK":false,"AKP":false},"Station":null,"NonSmoking":false,"DesignCar":[],"Seats":{"SeatsUndef":2,"SeatsDn":null,"SeatsUp":null,"SeatsLateralDn":null,"SeatsLateralUp":null,"FreeComp":null},"SeatsSexDto":null,"TypePlaces":3,"Places":["018","020"],"SpecialCarDetails":[],"BoardingForm":0,"AirConditionedCar":false,"EcoFriendlyToilets":false}]}],"IsTarifficated":false,"HasAirconditioningInfo":false}}]},"BackwardDirectionDto":null}
EOT;


        $psrResponse->getBody()->rewind();
        /** @var CarSearchResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            //$content,
            CarSearchResponse::class,
            'json'
        );



        return $response;
    }

    function routeAuthorized( IRequest $statuses ): ?IResponse {
        try
        {
            return $this->route( $statuses );
        }
        catch ( ClientException $exception )
        {
            switch ( $exception->getCode() )
            {
                case 401:
                    $this->getKTJService()->refreshProviderCookies();

                    return $this->route( $statuses );
                    break;
            }
            throw $exception;
        }
    }

    /**
     * @param IRequest $request
     *
     * @return IResponse|null
     * @throws GuzzleException
     */
    function route( IRequest $request ): ?IResponse {

        $data = <<<EOL
{"TrainRoute":{"Number":"015Т","Routes":["АЛМАТЫ 2","ПЕТРОПАВЛ"]},"Routes":[{"Title":"ОСНОВНОЙ МАРШРУТ","Route":["АЛМАТЫ 2","ПЕТРОПАВЛ"],"Stop":[{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"АЛМАТЫ 2","Code":"2700001","ArvTime":null,"WaitingTime":null,"DepTime":"12:09:00","Sign":null,"Days":"00","Distance":"0"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"АЛМАТЫ 1","Code":"2700002","ArvTime":"12:32:00","WaitingTime":"00:10:00","DepTime":"12:42:00","Sign":null,"Days":"00","Distance":"9"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ОТАР","Code":"2700750","ArvTime":"15:03:00","WaitingTime":"00:05:00","DepTime":"15:08:00","Sign":null,"Days":"00","Distance":"165"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"КОРДАЙ","Code":"2700398","ArvTime":"15:28:00","WaitingTime":"00:01:00","DepTime":"15:29:00","Sign":null,"Days":"00","Distance":"184"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ШУ","Code":"2700780","ArvTime":"17:27:00","WaitingTime":"00:51:00","DepTime":"18:18:00","Sign":null,"Days":"00","Distance":"320"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ХАНТАУ","Code":"2700838","ArvTime":"19:18:00","WaitingTime":"00:01:00","DepTime":"19:19:00","Sign":null,"Days":"00","Distance":"392"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ШЫГАНАК","Code":"2700831","ArvTime":"20:44:00","WaitingTime":"00:02:00","DepTime":"20:46:00","Sign":null,"Days":"00","Distance":"500"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"САРЫ ШАГАН","Code":"2700917","ArvTime":"23:00:00","WaitingTime":"00:15:00","DepTime":"23:15:00","Sign":null,"Days":"00","Distance":"640"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"МОЙЫНТЫ","Code":"2708970","ArvTime":"00:50:00","WaitingTime":"00:05:00","DepTime":"00:55:00","Sign":null,"Days":"01","Distance":"766"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"АКАДЫР","Code":"2708921","ArvTime":"02:35:00","WaitingTime":"00:15:00","DepTime":"02:50:00","Sign":null,"Days":"01","Distance":"903"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ЖАРЫК","Code":"2708940","ArvTime":"03:48:00","WaitingTime":"00:02:00","DepTime":"03:50:00","Sign":null,"Days":"01","Distance":"981"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"КАРАГАНД П","Code":"2708950","ArvTime":"05:20:00","WaitingTime":"00:25:00","DepTime":"05:45:00","Sign":null,"Days":"01","Distance":"1102"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"КАРАГАНД С","Code":"2708960","ArvTime":"06:12:00","WaitingTime":"00:15:00","DepTime":"06:27:00","Sign":null,"Days":"01","Distance":"1125"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"МЫРЗА","Code":"2708966","ArvTime":"07:36:00","WaitingTime":"00:02:00","DepTime":"07:38:00","Sign":null,"Days":"01","Distance":"1156"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"НУР-СУЛТАН1","Code":"2708000","ArvTime":"10:07:00","WaitingTime":"00:36:00","DepTime":"10:43:00","Sign":null,"Days":"01","Distance":"1343"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ШОРТАНДЫ","Code":"2708897","ArvTime":"11:40:00","WaitingTime":"00:03:00","DepTime":"11:43:00","Sign":null,"Days":"01","Distance":"1410"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"АК КУЛЬ","Code":"2708840","ArvTime":"12:14:00","WaitingTime":"00:03:00","DepTime":"12:17:00","Sign":null,"Days":"01","Distance":"1448"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"МАКИНКА","Code":"2708860","ArvTime":"13:15:00","WaitingTime":"00:03:00","DepTime":"13:18:00","Sign":null,"Days":"01","Distance":"1531"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"КУРОРТ БОР","Code":"2708850","ArvTime":"13:52:00","WaitingTime":"00:15:00","DepTime":"14:07:00","Sign":null,"Days":"01","Distance":"1569"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"КОКШЕТАУ 1","Code":"2708800","ArvTime":"15:13:00","WaitingTime":"00:28:00","DepTime":"15:41:00","Sign":null,"Days":"01","Distance":"1639"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ТАЙЫНША","Code":"2708870","ArvTime":"17:11:00","WaitingTime":"00:06:00","DepTime":"17:17:00","Sign":null,"Days":"01","Distance":"1709"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"СМИРНОВО","Code":"2708866","ArvTime":"18:19:00","WaitingTime":"00:04:00","DepTime":"18:23:00","Sign":null,"Days":"01","Distance":"1790"},{"Title":"ОСНОВНОЙ МАРШРУТ","Station":"ПЕТРОПАВЛ","Code":"2040500","ArvTime":"16:08:00","WaitingTime":"00:00:00","DepTime":"16:08:00","Sign":"ТАРИФНАЯ ГРАНИЦА","Days":"01","Distance":"1834"}]}]}
EOL;


        $psrResponse = $this->getKTJService()->getDctsClient()->request( 'post', $this->routeUri, [
            'cookies' => $this->getKTJService()->loadDCTSPCookies(),
            'body'    => $this->getSerializer()->serialize( $request, 'json' )
        ] );

        $psrResponse->getBody()->rewind();
        /** @var TrainRouteResponse $response */
        $response = $this->getSerializer()->deserialize(
            $psrResponse->getBody()->getContents(),
            //$data,
            TrainRouteResponse::class,
            'json'
        );


        return $response;
    }



    /**
     * @return KTJService|null
     */
    public function getKTJService(): ?KTJService
    {
        return $this->KTJService;
    }

    /**
     * @param KTJService|null $KTJService
     */
    public function setKTJService(?KTJService $KTJService): void
    {
        $this->KTJService = $KTJService;
    }

    /**
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * @param SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function getSearchUri(): string
    {
        return $this->searchUri;
    }

    /**
     * @param string $searchUri
     */
    public function setSearchUri(string $searchUri): void
    {
        $this->searchUri = $searchUri;
    }

    /**
     * @return string
     */
    public function getSearchCarsUri(): string
    {
        return $this->searchCarsUri;
    }

    /**
     * @param string $searchCarsUri
     */
    public function setSearchCarsUri(string $searchCarsUri): void
    {
        $this->searchCarsUri = $searchCarsUri;
    }

    /**
     * @return string|null
     */
    public function getRouteUri(): ?string
    {
        return $this->routeUri;
    }

    /**
     * @param string|null $routeUri
     */
    public function setRouteUri(?string $routeUri): void
    {
        $this->routeUri = $routeUri;
    }
}
