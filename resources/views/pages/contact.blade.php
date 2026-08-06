@extends('layouts.app')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with Cereal Transport by phone, WhatsApp, email or our contact form to discuss cereal transportation and supply.')

@section('content')

    <section class="hero" style="padding: 3.5rem 0;">
        <div class="container">
            <span class="hero-eyebrow">Contact Us</span>
            <h1 class="mt-3">We're Ready to Talk About Your Cereals</h1>
            <p class="lead mt-3">
                Reach out with any question about transportation or supply, or send a service
                request and we'll respond with a quotation.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-5">
                    <span class="eyebrow">Get In Touch</span>
                    <h2 class="mb-4">Contact Details</h2>

                    <div class="contact-info-item fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <h4>Phone</h4>
                            <p>+255 788 753 820</p>
                        </div>
                    </div>

                    <div class="contact-info-item fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.36 7.55L3 20l1.05-5.4A8.5 8.5 0 1 1 21 11.5z"></path></svg>
                        </div>
                        <div>
                            <h4>WhatsApp</h4>
                            <p>+255 788 753 820</p>
                        </div>
                    </div>

                    <div class="contact-info-item fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 6-10 7L2 6"></path></svg>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>enoselias057@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <h4>Office Location</h4>
                            <p>Dar es Salaam, Tanzania</p>
                        </div>
                    </div>

                    <div class="contact-info-item fade-in-up">
                        <div class="icon-tile">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                        </div>
                        <div>
                            <h4>Working Hours</h4>
                            <p>Monday – Saturday, 8:00 AM – 6:00 PM</p>
                        </div>
                    </div>

                    <a href="https://wa.me/255788753820" target="_blank" rel="noopener"
                    class="btn btn-whatsapp mt-2">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 0.4rem; vertical-align: -3px;"><path d="M21 11.5a8.5 8.5 0 0 1-12.36 7.55L3 20l1.05-5.4A8.5 8.5 0 1 1 21 11.5z"></path></svg>
                        Chat With Us on WhatsApp
                    </a>
                </div>

                <div class="col-lg-7">
                    <div class="card-service-detail fade-in-up">
                        <h2 class="h4 mb-1">Send Us a Message</h2>
                        <p class="form-hint mb-4">Fill in the form and our team will get back to you.</p>

                        <div class="form-success-msg" role="status">
                            Thank you — your message has been prepared. Our team will be in touch soon.
                        </div>
                        <div class="form-error-msg" role="alert">
                            Please check the highlighted fields and try again.
                        </div>

                        <form id="contact-form" action="https://formspree.io/f/mnpaqryn" method="POST" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Green route" required>
                                    <div class="invalid-feedback">Please enter your full name.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="+255 788 753 820" required>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="enoselias057@gmail.com" required>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    <div class="invalid-feedback">Please enter a subject.</div>
                                </div>
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your message here..." required></textarea>
                                    <div class="invalid-feedback">Please enter your message.</div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-brand">Send Message</button>
                                </div>
                                <div
                                class="form-success-msg alert alert-success"
                                style="display: none;"
                                role="status"
                                ></div>

                                <div
                                class="form-error-msg alert alert-danger"
                                style="display: none;"
                                role="alert"
                                ></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
