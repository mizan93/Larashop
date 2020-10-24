@extends('layouts.app')
@section('title','home')

@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.2402711150266!2d90.36329356498182!3d23.774456884577546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a555667c3d%3A0xec49503fc397c419!2sShyamoli%20Square%2C%20Plot%20%23%2024%2F1-2%2C%20Mirpur%20Rd%2C%20Dhaka%201207!5e0!3m2!1sen!2sbd!4v1603441489273!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>Larashop.</p>
                        <p>{{ $contact->address }}</p>
                        <p>{{ $contact->city }}</p>
                        <p>Mobile: {{ $contact->phone }}</p>
                        <p>Email: {{ $contact->email }}</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="{{ $contact->fb_link }}"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="{{ $contact->fb_link }}"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="{{ $contact->insta_link }}"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="{{ $contact->insta_link }}"><i class="fa fa-instagram"></i></a>

                            </li>

                            <li>
                                <a href="{{ $contact->youtube_link }}"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
