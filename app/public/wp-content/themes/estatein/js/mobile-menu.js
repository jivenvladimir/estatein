/**
 * Mobile Menu Toggle
 */
(function() {
	const mobileToggle = document.querySelector('.estatein-mobile-toggle');
	const navMenu = document.querySelector('.estatein-nav-menu-container');
	
	if (!mobileToggle || !navMenu) {
		return;
	}
	
	mobileToggle.addEventListener('click', function() {
		const isExpanded = mobileToggle.getAttribute('aria-expanded') === 'true';
		mobileToggle.setAttribute('aria-expanded', !isExpanded);
		navMenu.classList.toggle('active');
		document.body.classList.toggle('menu-open');
	});
	
	// Close menu when clicking outside
	document.addEventListener('click', function(event) {
		if (!navMenu.contains(event.target) && !mobileToggle.contains(event.target)) {
			navMenu.classList.remove('active');
			mobileToggle.setAttribute('aria-expanded', 'false');
			document.body.classList.remove('menu-open');
		}
	});
	
	// Close menu when clicking on a link
	const navLinks = navMenu.querySelectorAll('a');
	navLinks.forEach(function(link) {
		link.addEventListener('click', function() {
			navMenu.classList.remove('active');
			mobileToggle.setAttribute('aria-expanded', 'false');
			document.body.classList.remove('menu-open');
		});
	});
})();
