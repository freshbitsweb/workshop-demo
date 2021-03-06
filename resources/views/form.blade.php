<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

            <div class="col-lg-7">
                <div class="p-5">
                    @include('includes.errors')

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ $player->id ? 'Edit Player' : 'Insert Player' }}</h1>
                    </div>

                    <form class="user" action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($player->id)
                            @method('PUT')
                        @endif

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text"
                                    name="name"
                                    class="form-control form-control-user"
                                    value="{{ old('name', $player->name) }}"
                                    required
                                    placeholder="First Name"
                                >
                            </div>

                            <div class="col-sm-6">
                                <input type="text"
                                    name="batting_average"
                                    class="form-control form-control-user"
                                    value="{{ old('batting_average', $player->batting_average) }}"
                                    required
                                    placeholder="Batting Average"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text"
                                name="bowling_average"
                                class="form-control form-control-user"
                                value="{{ old('bowling_average', $player->bowling_average) }}"
                                required
                                placeholder="Bowling Average"
                            >
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="h6 text-gray-900 mr-2">Playing:</label>
                                <label class="mr-2">
                                    <input type="radio"
                                        name="playing"
                                        value="1"
                                        {{ ($player->playing == '1')? 'checked' : '' }}
                                    /> Yes
                                </label>
                                <label>
                                    <input type="radio"
                                        name="playing"
                                        value="0"
                                        {{ ($player->playing == '0')? 'checked' : '' }}
                                    /> No
                                </label>
                            </div>

                            <div class="col-sm-6">
                                <input type="file" name="avatar" accept="image/*">
                                @if ($player->id)
                                    <img src="{{ route('file_name', ['fileName' => $player->avatar]) }}" width="50px" heigh="50px">
                                @endif
                            </div>
                        </div>

                        <button type="submit" name="insert" class="btn btn-primary btn-user btn-block">
                            {{ $player->id ? 'Update' : 'Submit'  }}
                        </button>

                        <a href="{{ route('home') }}" class="btn btn-secondary btn-user btn-block">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
