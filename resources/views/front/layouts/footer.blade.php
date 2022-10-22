<footer>
    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <img src="{{ asset('assets/images/ahla/logo.png') }}" alt="logo" style="    height: 200px;">
                    </div>
                </div>
                <div class="col-lg-2 ml-auto">
                    <div class="widget">
                        <h3 class="color-white">Quick Links</h3>
                        <ul class="list-unstyled float-left links">
                            <li><a href="#" class="color-white">About us</a></li>
                            <li><a href="#" class="color-white">Sign up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget">
                        <h3 class="color-white">Others</h3>
                        <ul class="list-unstyled float-left links">
                            <li><a href="{{ route('services') }}" class="color-white">Services</a></li>
                            <li><a href="#" class="color-white">Contact us</a></li>
                            <li><a href="#" class="color-white">Privacy Policy</a></li>
                            <li><a href="#" class="color-white">Terms and Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget">
                        <p class="color-white">Subscribe to our newsletter and be the first to know about our updates</p>
                        <div class="newsletter-form mb-40">
                            <form id="subscribe_form" name="subscribe_form" >
                                @csrf
                                <div class="form-group">
                                   <div class="row">
                                    <div class="col-lg-9 ">
                                        <input type="email" class="form-control subscribe" id="subscribe" name="subscribe" placeholder="{{__('Your Email Address')}}" />

                                    </div>
                                    <div class="col-lg-3 text-center">
                                        <button type="button" class="subscribe-btn subscribe_btn" style=" ">{{ __('Subscribe')}}</button>
                                    </div>
                                   </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
