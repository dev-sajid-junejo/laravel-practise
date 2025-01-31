@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User Details</h4>
                    <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('POST')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="{{ old('lname', $user->lname) }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                        </div>

                        <!-- Address 1 -->
                        <div class="form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" name="address1" id="address1" class="form-control" value="{{ old('address1', $user->address1) }}">
                        </div>

                        <!-- Address 2 -->
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" name="address2" id="address2" class="form-control" value="{{ old('address2', $user->address2) }}">
                        </div>

                        <!-- City -->
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $user->city) }}">
                        </div>

                        <!-- State -->
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $user->state) }}">
                        </div>

                        <!-- Country -->
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $user->country) }}">
                        </div>

                        <!-- Pincode -->
                        <div class="form-group">
                            <label for="pincode">Pincode</label>
                            <input type="text" name="pincode" id="pincode" class="form-control" value="{{ old('pincode', $user->pincode) }}">
                        </div>

                        <!-- Role -->
                        <div class="form-group">
                            <label for="role_as">Role</label>
                            <select name="role_as" id="role_as" class="form-control">
                                <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection