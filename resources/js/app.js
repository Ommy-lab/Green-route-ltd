/**
 * Cereal Transport — front-end behaviour
 * Vanilla JS only. No backend logic lives here.
 */
import 'bootstrap';
import 'intl-tel-input/styles';
import intlTelInput from 'intl-tel-input';


/* ---------------------------------------------------------
 * Service request form behaviour
 * ------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    const serviceType = document.getElementById('service_type');
    const transportFields = document.getElementById('transportFields');
    const pickupGroup = document.getElementById('pickupLocationGroup');
    const pickupInput = document.getElementById('pickup_location');
    const deliveryInput = document.getElementById('delivery_location');

    if (!serviceType || !transportFields) {
        return;
    }

    const updateServiceFields = () => {
        const selectedService = serviceType.value;

        if (selectedService === 'buy_without_transport') {
            transportFields.classList.add('d-none');

            pickupInput.required = false;
            deliveryInput.required = false;

            return;
        }

        transportFields.classList.remove('d-none');

        deliveryInput.required = true;

        if (selectedService === 'transport_own_cereals') {
            pickupGroup.classList.remove('d-none');
            pickupInput.required = true;
        } else if (selectedService === 'buy_with_transport') {
            pickupGroup.classList.add('d-none');
            pickupInput.required = false;
            pickupInput.value = '';
        } else {
            pickupGroup.classList.remove('d-none');
            pickupInput.required = false;
            deliveryInput.required = false;
        }
    };

    serviceType.addEventListener('change', updateServiceFields);

    updateServiceFields();
});


/* ---------------------------------------------------------
 * International phone input
 * ------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    initializePhoneInput({
        visibleInputId: 'phone_display',
        hiddenInputId: 'phone',
        errorId: 'phone_error',
        formId: 'serviceRequestForm',
    });

    initializePhoneInput({
        visibleInputId: 'tracking_phone_display',
        hiddenInputId: 'tracking_phone',
        errorId: 'tracking_phone_error',
    });
});

function initializePhoneInput({
    visibleInputId,
    hiddenInputId,
    errorId,
    formId = null,
}) {
    const visibleInput = document.getElementById(visibleInputId);
    const hiddenInput = document.getElementById(hiddenInputId);
    const errorElement = document.getElementById(errorId);

    if (!visibleInput || !hiddenInput) {
        return;
    }

    const phoneInstance = intlTelInput(visibleInput, {
        initialCountry: 'tz',
        separateDialCode: true,
        nationalMode: true,
        loadUtils: () => import('intl-tel-input/utils')
    });

    const saveInternationalNumber = () => {
        const enteredValue = visibleInput.value.trim();

        if (!enteredValue) {
            hiddenInput.value = '';

            if (errorElement) {
                errorElement.style.display = 'none';
            }

            return false;
        }

        if (!phoneInstance.isValidNumber()) {
            hiddenInput.value = '';

            if (errorElement) {
                errorElement.style.display = 'block';
            }

            return false;
        }

        hiddenInput.value = phoneInstance.getNumber();

        if (errorElement) {
            errorElement.style.display = 'none';
        }

        return true;
    };

    visibleInput.addEventListener('blur', saveInternationalNumber);
    visibleInput.addEventListener('change', saveInternationalNumber);
    visibleInput.addEventListener('countrychange', saveInternationalNumber);

    visibleInput.addEventListener('input', () => {
        if (errorElement) {
            errorElement.style.display = 'none';
        }
    });

    const form = formId
        ? document.getElementById(formId)
        : visibleInput.closest('form');

    if (form) {
        form.addEventListener('submit', (event) => {
            if (!saveInternationalNumber()) {
                event.preventDefault();
                visibleInput.focus();
            }
        });
    }
}


/* ---------------------------------------------------------
 * Existing public website behaviour
 * ------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    initLoadingScreen();
    initNavbarScroll();
    initScrollFadeIn();
    initContactFormFeedback();
});


/* ---------------------------------------------------------
 * 1. Loading screen — remove quickly, never block content
 * ------------------------------------------------------- */

function initLoadingScreen() {
    const loader = document.getElementById('loading-screen');

    if (!loader) return;

    const hideLoader = () => loader.classList.add('is-hidden');

    // Hide as soon as the page is interactive; fall back to a short
    // timer so the loader never blocks access to the site.
    window.requestAnimationFrame(() => {
        setTimeout(hideLoader, 250);
    });

    window.addEventListener('load', hideLoader);
}


/* ---------------------------------------------------------
 * 2. Navbar: shrink + shadow on scroll, active link support
 * ------------------------------------------------------- */

function initNavbarScroll() {
    const navbar = document.querySelector('.site-navbar');

    if (!navbar) return;

    const toggleScrolled = () => {
        navbar.classList.toggle('is-scrolled', window.scrollY > 12);
    };

    toggleScrolled();

    window.addEventListener('scroll', toggleScrolled, {
        passive: true,
    });

    // Collapse the mobile menu automatically after a link is tapped.
    const collapseEl = document.getElementById('mainNav');

    if (collapseEl && window.bootstrap) {
        const bsCollapse =
            window.bootstrap.Collapse.getOrCreateInstance(collapseEl, {
                toggle: false,
            });

        collapseEl.querySelectorAll('.nav-link').forEach((link) => {
            link.addEventListener('click', () => {
                if (collapseEl.classList.contains('show')) {
                    bsCollapse.hide();
                }
            });
        });
    }
}


/* ---------------------------------------------------------
 * 3. Lightweight scroll-triggered fade-in
 * ------------------------------------------------------- */

function initScrollFadeIn() {
    const targets = document.querySelectorAll('.fade-in-up');

    if (!targets.length) return;

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    if (
        prefersReducedMotion ||
        !('IntersectionObserver' in window)
    ) {
        targets.forEach((element) => {
            element.classList.add('is-visible');
        });

        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.15,
            rootMargin: '0px 0px -40px 0px',
        }
    );

    targets.forEach((element) => {
        observer.observe(element);
    });
}


/* ---------------------------------------------------------
 * 4. Contact form — front-end feedback only
 *    No submission logic here; the real handler is backend-owned.
 * ------------------------------------------------------- */

function initContactFormFeedback() {
    const form = document.getElementById('contact-form');

    if (!form) return;

    const successMsg = form.querySelector('.form-success-msg');
    const errorMsg = form.querySelector('.form-error-msg');
    const submitButton = form.querySelector('[type="submit"]');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        if (!form.checkValidity()) {
            form.classList.add('was-validated');

            if (errorMsg) {
                errorMsg.textContent =
                    'Please check the highlighted fields and try again.';
                errorMsg.style.display = 'block';
            }

            if (successMsg) {
                successMsg.style.display = 'none';
            }

            return;
        }

        form.classList.add('was-validated');

        if (errorMsg) {
            errorMsg.style.display = 'none';
        }

        if (successMsg) {
            successMsg.style.display = 'none';
        }

        const originalButtonText = submitButton?.textContent;

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';
        }

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    Accept: 'application/json',
                },
            });

            if (!response.ok) {
                throw new Error('Formspree rejected the submission.');
            }

            form.reset();
            form.classList.remove('was-validated');

            if (successMsg) {
                successMsg.textContent =
                    'Thank you. Your message has been sent successfully. Our team will respond as soon as possible.';
                successMsg.style.display = 'block';
            }
        } catch (error) {
            console.error('Contact form error:', error);

            if (errorMsg) {
                errorMsg.textContent =
                    'Sorry, your message could not be sent right now. Please try again shortly.';
                errorMsg.style.display = 'block';
            }
        } finally {
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent =
                    originalButtonText || 'Send Message';
            }
        }
    });
}

/* ---------------------------------------------------------
 * Administrator Dashboard behaviour
 * Only runs when admin elements exist on the page — safe on
 * every other page including the public site.
 * ------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    initAdminSidebar();
});

function initAdminSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('adminSidebarOverlay');
    const openBtn = document.getElementById('adminSidebarToggle');
    const closeBtn = document.getElementById('adminSidebarClose');

    // Not on an admin page — do nothing.
    if (!sidebar || !overlay || !openBtn) return;

    const openSidebar = () => {
        sidebar.classList.add('is-open');
        overlay.classList.add('is-active');
        openBtn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('admin-no-scroll');
    };

    const closeSidebar = () => {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-active');
        openBtn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('admin-no-scroll');
    };

    openBtn.addEventListener('click', openSidebar);

    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }

    overlay.addEventListener('click', closeSidebar);

    // Close on Escape key.
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && sidebar.classList.contains('is-open')) {
            closeSidebar();
            openBtn.focus();
        }
    });

    // Close automatically after tapping a nav link on mobile.
    sidebar.querySelectorAll('.admin-nav-link').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 991.98) {
                closeSidebar();
            }
        });
    });

    // Bootstrap's dropdown JS (imported via `import 'bootstrap'` above)
    // already powers the admin user-menu dropdown through data-bs-toggle,
    // so no extra dropdown code is needed here.
}

/* ---------------------------------------------------------
 * Admin quotation total
 * ------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.quotation-value');
    const totalElement = document.getElementById('quotationTotal');

    if (!inputs.length || !totalElement) {
        return;
    }

    const calculateQuotationTotal = () => {
        let subtotal = 0;
        let discount = 0;

        inputs.forEach((input) => {
            const value = Number.parseFloat(input.value) || 0;

            if (input.name === 'discount') {
                discount = value;
            } else {
                subtotal += value;
            }
        });

        const total = Math.max(subtotal - discount, 0);

        totalElement.textContent = total.toLocaleString(
            'en-US',
            {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }
        );
    };

    inputs.forEach((input) => {
        input.addEventListener(
            'input',
            calculateQuotationTotal
        );
    });

    calculateQuotationTotal();
});