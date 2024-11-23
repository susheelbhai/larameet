<section>
    <div class="container py-5">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <style>
                        .card-body{
                                padding: 0;
                        }
                        #chat_container{
                                margin: 20px;
                        }
                    .chat_user_img {
                        width: 40px;
                        height: 40px;
                        border-radius: 40px;
                        display: inline;
                    }

                    .chat_user_img_small {
                        width: 20px;
                        height: 20px;
                        border-radius: 20px;
                        display: inline;
                    }
                </style>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                        style="border-top: 4px solid #ffa900;">
                        <h5 class="mb-0">
                            <img src="{{ asset($user->profile_pic ?? '') }}" class="chat_user_img">
                            {{ $user->name ?? '' }}
                        </h5>
                        <div class="d-flex flex-row align-items-center">
                            <a href="{{ route('meet') }}">
                                <i class="fas fa-times text-muted fa-xs"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body" data-mdb-perfect-scrollbar-init>

                        <div id="chat_container">
                            @forelse ($messages as $i)
                                @if ($i->sender_id == $user->id)
                                    <div class="d-flex justify-content-between">
                                        <p class="small mb-1">
                                            <img class="chat_user_img_small"
                                                src="{{ asset($i['sender']['profile_pic']) }}" alt="avatar 1">
                                            {{ $i['sender']['name'] }}
                                        </p>
                                        <p class="small mb-1 text-muted"> </p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-start">

                                        <div>
                                            <p class="small p-2 ms-3 mb-3 rounded-3 bg-secondary ">
                                                <span class="small text-muted">{{ $i['created_at'] }}</span> <br>
                                                {{ $i['message'] }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between">
                                        <p class="small mb-1 text-muted"> </p>
                                        <p class="small mb-1">
                                            <img class="chat_user_img_small"
                                                src="{{ asset($i['sender']['profile_pic']) }}" alt="avatar 1">
                                            {{ $i['sender']['name'] }}
                                        </p>

                                    </div>
                                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                        <div>
                                            <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">

                                                <span class="small text-muted">{{ $i['created_at'] }}</span> <br>
                                                {{ $i['message'] }}
                                            </p>

                                        </div>

                                    </div>
                                @endif

                            @empty
                                No message found
                            @endforelse
                        </div>
                        @include('larameet::components.video_container')




                    </div>
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">

                        <span id="callBtn" data-user="{{ $user->id ?? '' }}" class="p-2 cursor-pointer">
                            <i class="fa-solid fa-video"></i>
                        </span>
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Type message"
                                aria-label="Recipient's username" aria-describedby="button-addon2" />
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-warning" type="button"
                                id="button-addon2" style="padding-top: .55rem;">
                                Send
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
