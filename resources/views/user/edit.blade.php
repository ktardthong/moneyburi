<div class="row white_bg" ng-controller="userController" style="padding-top: 15px;margin-bottom: 10px">

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
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-xs-12 col-sm-6">
            <label>First Name</label>
            <input ng-model="ng_userfname" class="form-control input-lg" id="editFirstname" placeholder="First Name" required>
        </div>

        <div class="col-xs-12 col-sm-6">
            <label>Last Name</label>
            <input ng-model="ng_userlname" class="form-control borderless" placeholder="Last Name" id="editLastname" required>
        </div>


        <div class="col-xs-12 col-sm-6">
            <label>Email</label>
            <input ng-model="ng_email" class="form-control borderless" placeholder="Email" id="editEmail" required>

            <label>Phone number</label>
            <input type="text" value="@{{ userData.email  }}" class="form-control borderless" placeholder="Email" id="editPhone">
        </div>

        <div class="col-xs-12 col-sm-6">

            <div class="col-xs-12">
                <div class="btn-group lead" data-toggle="buttons">

                    <select id="jobtype">
                        <option ng-repeat="x in items" value="@{{ x.id }}">@{{ x.name}}</option>
                    </select>

                </div>
            </div>

        </div>
    </div>

    <button class="btn btn-primary btn-block" ng-click="saveInfo()">Save</button>
</div>