<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $method ? 'Edit Player' : 'Insert Player' }}</h1>
                    </div>

                    <form class="user" action="{{ $route }}" method="POST">
                        @csrf

                        @if ($method)
                            @method($method)
                        @endif
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text"
                                    class="form-control form-control-user"
                                    value="{{ old('name', $player->name) }}"
                                    placeholder="First Name"
                                >
                            </div>

                            <div class="col-sm-6">
                                <input type="number"
                                class="form-control form-control-user"
                                value="{{ old('name', $player->batting_average) }}"
                                placeholder="Batting Average"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="number"
                            class="form-control form-control-user"
                            value="{{ old('name', $player->bowling) }}"
                            placeholder="Bowling Average"
                            >
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 text-center">
                                <label class="mr-2">
                                    <input type="radio" name="playing" value="1"> Yes
                                </label>
                                <label>
                                    <input type="radio" name="playing" value="0"> No
                                </label>
                            </div>

                            <div class="col-sm-6">
                                <input type="file" accept="image/*">
                            </div>
                        </div>
                    </form>
                    <button type="submit" name="insert" class="btn btn-primary btn-user btn-block">
                        {{ $method ? 'Update' : 'Submit'  }}
                    </button>

                    <a href="{{ route('home') }}" class="btn btn-secondary btn-user btn-block">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
