<footer class="site-footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <p class="footer-brand mb-2">GREEN <span>ROUTE</span></p>
                <p class="mb-3">
                    Reliable transportation and supply of maize, rice, beans, wheat and other
                    cereals, connecting farms and warehouses to customers across Tanzania.
                </p>
                <div class="footer-social" aria-label="Social media links">
                    <a href="https://www.facebook.com/share/p/1GRXGmtLHt/</a>" aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="https://www.instagram.com/zunguphd_?igsh=bDNsb3l0MGo5eWdz" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line></svg>
                    </a>
                    <a href="https://wa.me/255788753820" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.5 8.5 0 0 1-12.36 7.55L3 20l1.05-5.4A8.5 8.5 0 1 1 21 11.5z"></path></svg>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('cereals') }}">Our Cereals</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5>Our Services</h5>
                <ul>
                    <li><a href="{{ route('services') }}#transport-own">Transport My Own Cereals</a></li>
                    <li><a href="{{ route('services') }}#buy-with-transport">Buy Cereals With Transportation</a></li>
                    <li><a href="{{ route('services') }}#buy-without-transport">Buy Cereals Without Transportation</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5>Contact</h5>
                <ul>
                    <li>Phone: +255 788 753 820</li>
                    <li>WhatsApp: +255 788 753 820</li>
                    <li>Email: enoselias057@gmail.com</li>
                    <li>Dar es Salaam, Tanzania</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between gap-2">
            <p class="mb-0">&copy; {{ date('Y') }} GREEN ROUTE ltd. All rights reserved.</p>
            <p class="mb-0">Built for reliable cereal transportation across Tanzania.</p>
        </div>
    </div>
</footer>
