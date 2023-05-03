function l(c) {
	var d = 0;
	return function () {
		return d < c.length
			? {
					done: !1,
					value: c[d++],
			  }
			: {
					done: !0,
			  };
	};
}
function t(c) {
	var d = "undefined" != typeof Symbol && Symbol.iterator && c[Symbol.iterator];
	return d
		? d.call(c)
		: {
				next: l(c),
		  };
}
(function () {
	function c() {
		var b = parseFloat(g.value);
		b < MININUM_DONATION
			? (n.classList.remove("visually-hidden"), g.classList.add("error"))
			: (n.classList.add("visually-hidden"), g.classList.remove("error"));
		for (var a = !1, f = t(h), e = f.next(); !e.done; e = f.next())
			(e = e.value),
				e.dataset.amount == b
					? (d(e), (a = !0))
					: e.classList.contains("selected") && e.classList.remove("selected");
		a || d(h[h.length - 1]);
	}
	function d(b) {
		b.classList.contains("selected") || b.classList.add("selected");
	}
	var h = document.querySelectorAll(".choice"),
		g = document.querySelector(".amount"),
		p = document.querySelector("#donation-form"),
		n = document.querySelector(".donation-error");
	p.addEventListener("submit", function (b) {
		b.preventDefault();
		parseFloat(amount.value) >= MININUM_DONATION && p.submit();
	});
	g.addEventListener(
		"input",
		(function (b, a) {
			a = void 0 === a ? 500 : a;
			var f;
			return function (e) {
				for (var q = [], k = 0; k < arguments.length; ++k)
					q[k - 0] = arguments[k];
				f && clearTimeout(f);
				f = setTimeout(function () {
					b.apply(null, q);
				}, a);
			};
		})(c)
	);
	for (var r = t(h), m = r.next(); !m.done; m = r.next())
		m.value.addEventListener("click", function () {
			for (var b = t(h), a = b.next(); !a.done; a = b.next())
				(a = a.value), a !== this && a.classList.remove("selected");
			d(this);
			g.value = this.dataset.amount;
			c();
		});
})(MININUM_DONATION);
