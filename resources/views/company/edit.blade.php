

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




<div class="row">
    <form action="{{ route('company.update',$company_info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <br><br>
            <div class="well">
                <h3>Update Company</h3>
                <br>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="@if(isset($company_info)){{$company_info->name}} @else {{old('name')}} @endif">
                    @if($errors->has('name'))<div class="error"><p style="color: red">{{$errors->first('name')}}</p> </div> @endif

                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="@if(isset($company_info)){{$company_info->email}} @else {{old('email')}} @endif">
                    @if($errors->has('email'))<div class="error"><p style="color: red">{{$errors->first('email')}}</p> </div> @endif

                </div>
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" name="website" id="website" class="form-control" value="@if(isset($company_info)){{$company_info->website}} @else {{old('website')}} @endif">

                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
        </div>
    </form>
</div>
