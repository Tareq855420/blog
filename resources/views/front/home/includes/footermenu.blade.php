<div class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4">About Me</h3>
                <p>I am a student at Daffodil International University studying Computer Science and Technology (CSE).

                    As I am interested in software and website development, I have learned Object-Oriented Program (OOP). I have mastery in HTML, CSS, PHP, Laravel.

                    For leisure period, I mostly learn new programming languages and read articles about new software technology.
                </p>
            </div>
            <div class="col-md-3 ml-auto">
                <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                <ul class="list-unstyled float-left mr-5">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('category',['id']) }}">Category</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    @if(!Auth::check())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a></li>
                        <form action="{{ route('logout') }}" method="post" id="logoutForm">
                            @csrf
                        </form>
                    @endif
                </ul>
            </div>
            <div class="col-md-4">


                <div>
                    <h3 class="footer-heading mb-4">Connect With Me</h3>
                    <p>
                        <a href="https://www.facebook.com/tareq.khan.984"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                        <a href="https://twitter.com/TareqKhan8554"><span class="icon-twitter p-2"></span></a>
                        <a href="https://www.instagram.com/tareqkhan8554/"><span class="icon-instagram p-2"></span></a>
                        <a href="https://github.com/Tareq855420"><span class="icon-github p-2"></span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart text-danger" aria-hidden="true"></i> To <a href="#">Tareq Khan</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</div>
