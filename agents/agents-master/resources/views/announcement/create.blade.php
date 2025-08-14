    <!DOCTYPE html>
    @extends('layouts.app')

    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="/create/announcement">
                    @csrf
                    <input type="hidden" id="">
                    <div class="formdiv flatbox-light bt-tasks">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <div class="form-group">
                            <label for="exampleFormControlInput1"> {{trans('announcement.text')}}</label>
                            <textarea class="form-control" name="text" id="editor"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{trans('announcement.date_start')}}</label>
                            <input type="datetime-local" class="form-control" name="date_start" >
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{trans('announcement.date_end')}}</label>
                            <input type="datetime-local" class="form-control" name="date_end" >
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{trans('announcement.type')}}</label>
                            <select class="form-control" name="type">
                                <option disabled selected>{{'Выберите тип'}}</option>
                                <option value="error">{{'error'}}</option>
                                <option value="warning">{{ 'warning'}}</option>
                                <option value="info">{{ 'info' }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="ms-2 btn btn-success mt-2 float-end">{{ 'save' }}</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="{{ asset('tools/tinymce/tinymce.min.js') }}"></script>
        <script>
                tinymce.init({
                    selector: '#editor',
                    language: 'ru_RU',
                    browser_spellcheck: true,
                    plugins: 'lists, link, autolink, paste, fullscreen, addparag, wordcount',
                    link_quicklink: true,
                    menubar: false,
                    toolbar: 'undo redo removeformat pastetext| bold italic | fontsizeselect link| userlookup | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | fullscreen',
                    branding: false
                });

        </script>";

    @endsection

    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-check input {
            display: none;
        }


        .form-check-label {
            position: relative;
            margin-left: 1.5rem;
            cursor: pointer;
            font-size: 14px;
        }

        .form-check input + .form-check-label:before {
            content: '';
            display: inline-block;
            width: 16px;
            height: 16px;
            margin-right: 0.5rem;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .form-check input:checked + .form-check-label:before {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .form-check input:checked + .form-check-label:after {
            content: '\2713';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 12px;
        }

    </style>
