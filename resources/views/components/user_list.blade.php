<section>
    <div class="container py-5">

        <style>
            .chat_user_div img {
                width: 60px;
                height: 60px;
                border-radius: 60px;
            }
        </style>

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">

                <div class="card">
                    <div class="card-header justify-content-between align-items-center p-3"
                        style="border-top: 4px solid #ffa900;">
                        <h5 class="mb-0">Chats</h5>
                        <div class=" pt-1">
                                <input type="text" class="form-control" placeholder="Search User..." />
                        </div>
                    </div>
                    <div class="card-body" data-mdb-perfect-scrollbar-init style="position: relative;">

                        @forelse ($users as $i)
                            <a href="{{ route('chat', $i['id']) }}" class="chat_user_div">

                                <div class="d-flex flex-row justify-content-start py-2">
                                    <img src="{{ asset($i['profile_pic']) }}" alt="avatar 1">
                                    <div>
                                        <div class="d-flex justify-content-between px-2">
                                            <p class="small font-bold mb-1">{{ $i['name'] }}</p>
                                            <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                                        </div>
                                        <p class="small px-2 rounded-3 bg-body-tertiary">For what reason
                                            would it
                                            be advisable for me to think about business content?</p>
                                    </div>
                                </div>

                            </a>
                            <hr>
                        @empty
                            no user found
                        @endforelse


                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
