



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="row">

    <form action="{{ route('do.login') }}" method="POST" >
        @csrf
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <br><br>
            <div class="well">
                @if(session()->has('msg'))<p style="color: red">{{session('msg')}}</p> @endif
                <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}"/>
                    <label class="form-label" for="email">Email address</label>
                    @if($errors->has('email'))<div class="error"><p style="color: red">{{$errors->first('email')}}</p></div> @endif
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control" name="password"  value="{{old('password')}}"/>
                    <label class="form-label" for="password">Password</label>
                    @if($errors->has('password'))<div class="error"><p style="color: red">{{$errors->first('password')}} </p></div> @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </div>
        </div>
    </form>
</div>





