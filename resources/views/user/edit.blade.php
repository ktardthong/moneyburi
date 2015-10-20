<div class="row white_bg" ng-controller="userController" style="padding-top: 15px;margin-bottom: 10px">
    <div class="container-fluid">
        <div ng-if="!ng_userfname" class="alert-danger">Missing First Name</div>
        <div ng-if="!ng_userlname" class="alert-danger">Missing Last Name</div>
        <div ng-if="!ng_email" class="alert-danger">Missing Email</div>
    </div>

    <div id="userdata_alert_message" class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Save!</strong>
    </div>

    <div class="container-fluid">
        <div class="col-xs-12 col-sm-6">
            <h4>Your photo</h4>
            <img src="@{{ userData.avatar? '/userimg/'+userData.avatar : '/img/user_avatar.gif' }}"
                                             class="img-circle img-responsive pull-left">
        </div>

        <div class="col-xs-12 col-sm-6">
            <label>Select a file to upload</label>
            {!! Form::open(array('id' => 'search',
                                             'method' => 'POST',
                                             'url' => '/profileImage/upload',
                                             'files' => true)) !!}
            {!! csrf_field() !!}
            {!! Form::file('image', null) !!}
            <button class="btn btn-block btn-primary" value="Upload image">Upload image</button>
            {!! Form::close() !!}

            <div class="container-fluid" style="margin-top: 50px">

                <div class="row md-headline">Your Info</div>

                <div class="row">
                    <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                        <input  ng-required="true"
                                type="text"
                                placeholder="First Name"
                                class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="First Name"
                                ng-model="ng_userfname" id="editFirstname"
                                required="required" aria-required="true" aria-invalid="true" style="">

                    </md-input-container>
                </div>

                <div class="row">
                    <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                        <input  ng-required="true"
                                type="text"
                                placeholder="Last Name"
                                class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Last Name"
                                ng-model="ng_userlname" id="editLastname"
                                required="required" aria-required="true" aria-invalid="true" style="">

                    </md-input-container>
                </div>


                <div class="row">
                    <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                        <input  ng-required="true"
                                type="text"
                                placeholder="Email"
                                class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Last Name"
                                class="input input-lg borderless"
                                ng-model="ng_email" id="editEmail"
                                required="required" aria-required="true" aria-invalid="true" style="">

                    </md-input-container>
                </div>


                    {{--<label></label>
                    <input type="text" value="@{{ userData.email  }}" class="form-control borderless" placeholder="Email" id="editPhone">--}}

                    <div class="row">

                        <div class="btn-group lead" data-toggle="buttons">

                            <md-select ng-model="userJobType" id="jobtype" aria-required="true" aria-invalid="true"
                                        aria-label="Last Name">

                                <md-option  ng-repeat="(index,item) in userJobs"
                                            ng-selected="(@{{item.id}} == @{{ userData.job }}) ? true:false"
                                            value="@{{item.id}}">@{{item.name}}</md-option>
                            </md-select>

                        </div>

                    </div>
                </div>

        </div>


    </div>

    <button
            ng-if="ng_userfname && ng_userlname && ng_email"
            class="btn btn-primary btn-block" ng-click="saveUserData()">Save</button>
</div>

<script>
    $('#userdata_alert_message').hide();
</script>