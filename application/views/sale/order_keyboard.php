

<!--<div id="page-wrap">-->

	<!-- Links to other demo pages & docs -->
<!--	<div id="nav">
		<a class="current" href="index.html">Main Demo</a>
		<a href="docs/basic.html">Basic</a>
		<a href="docs/mobile.html">Mobile</a>
		<a href="docs/layouts.html">Layouts</a>
		<a href="docs/layouts2.html">Layouts2</a>
		<a href="docs/layouts3.html">Layouts3</a>
		<a href="docs/scramble.html">Scramble</a>
		<a href="docs/navigate.html">Navigate</a>
		<a href="docs/preview-keyset.html">Keyset</a>
		<a href="docs/extender.html">Extender</a>
		<a href="docs/altkeys-popup.html">AltKeys</a>
		<a href="docs/calculator.html">Calculator</a>
		<br>
		<a class="play" href="http://jsfiddle.net/Mottie/egb3a1sk/">Playground</a>
		<a class="git" href="https://github.com/Mottie/Keyboard/wiki">Documentation</a>
		<a class="git" href="https://github.com/Mottie/Keyboard/archive/master.zip">Download</a>
		<a class="issue" href="https://github.com/Mottie/Keyboard/issues">Issues</a><br>
	</div>-->
	<!-- End Links -->

<!--	<h1>
		<a href="https://github.com/Mottie/Keyboard">Virtual Keyboard</a><br>
		<small class="version"></small>
	</h1>
	<iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=Mottie&amp;repo=keyboard&amp;type=fork&amp;count=true" width="90" height="20" title="Fork on GitHub"></iframe>
	<iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=Mottie&amp;repo=keyboard&amp;type=watch&amp;count=true" width="100" height="20" title="Star on GitHub"></iframe>
	<h5>Original by
		<a href="http://jsatt.blogspot.com/2010/01/on-screen-keyboard-widget-using-jquery.html">Jeremy Satterfield</a>,
		updated &amp; maintained by <a href="http://wowmotty.blogspot.com/2010/11/jquery-ui-keyboard-widget.html">Rob Garrison</a>
	</h5>-->

<!--	<ul id="console">
		<li>...</li>
		<li>...</li>
		<li>...</li>
		<li>...</li>
		<li>...</li>
	</ul>

	<h5>
		Click inside the input or textarea to open the keyboard<br>
		Click on the keyboard title, then scroll down to see its code
	</h5>-->

<!--	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">QWERTY Text</span>
		</h2>
		<input id="text" class="qwerty" type="text" placeholder=" Enter something...">
		<br>
		<small>
			* Placeholder (watermark).<br>
			* Autocomplete.
		</small>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;input class="qwerty" type="text" placeholder=" Enter something..."&gt;</pre>
			<h4>Script</h4>-->
<!--			<pre class="prettyprint lang-js">// Autocomplete demo
var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure",
	"COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript",
	"Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme" ];-->

<!--$('.qwerty:eq(0)')
	.keyboard({ layout: 'qwerty' })
	.autocomplete({
		source: availableTags
	})
	.addAutocomplete()
	.addTyping();-->
<!--                </pre>
		</div>
	</div>

	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">QWERTY Password</span>
                        <img id="passwd" class="tooltip-tipsy" title="Click to open the virtual keyboard" src="<?php // echo base_url().'template_keyboard/'; ?>css/images/keyboard.svg">
		</h2>
		<input id="password" class="qwerty" type="text">
		<br>-->
<!--		<small>
			* Click icon to open keyboard.<br>
			* Stay open until accept/cancel.<br>
			* Key hover disabled in this type.
		</small>-->
		<!--<div class="code ui-corner-all">-->
			<!--<h4>HTML</h4>-->
<!--			<pre class="prettyprint lang-html">&lt;img id="passwd" class="tooltip-tipsy" title="Click to open the virtual keyboard" src="css/images/keyboard.svg"&gt;
&lt;input class="qwerty" type="password"&gt;</pre>-->
			<!--<h4>Script</h4>-->
			<!--<pre class="prettyprint lang-js">$('.qwerty:eq(1)')-->
<!--	.keyboard({
		openOn : null,
		stayOpen : true,
		layout : 'qwerty'
	})
	.addTyping();

$('#passwd').click(function(){
	var kb = $('.qwerty:eq(1)').getkeyboard();
	// close the keyboard if the keyboard is visible and the button is clicked a second time
	if ( kb.isOpen ) {
		kb.close();
	} else {
		kb.reveal();
	}
});-->
                        <!--</pre>-->
		<!--</div>-->
	<!--</div>-->

<!--	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">QWERTY Text Area</span>
		</h2>
		<textarea id="textarea" class="qwerty"></textarea>
		<br>
		<small>
			* Locked input (no manual input).<br>
			* Position the hidden caret!<br>
			* Known readonly bug in Safari.
		</small>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;textarea class="qwerty"&gt;&lt;/textarea&gt;</pre>
			<h4>Script</h4>
			<pre class="prettyprint lang-js">$('.qwerty:eq(2)')
	.keyboard({
		layout   : 'qwerty',
		lockInput: true // prevent manual keyboard entry
	})
	.addTyping();</pre>
		</div>
	</div>-->

<!--	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">International</span>
                        <img id="inter-type" class="tooltip-tipsy" title="Try out the typing extension!" src="<?php // echo base_url().'template_keyboard/'; ?>css/images/keyboard.svg">
		</h2>
		<textarea id="inter"></textarea>
		<br>
		<small>
			* <a href="http://bootswatch.com/darkly/">Bootswatch Darkly</a> theme.
		</small>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;img id="inter-type" class="tooltip-tipsy" title="Try out the typing extension!" src="css/images/keyboard.svg"&gt;
&lt;textarea id="inter"&gt;&lt;/textarea&gt;</pre>
			<h4>CSS</h4>
			<pre class="prettyprint lang-css">/* override bootstrap active state */
button.btn-default:active {
	background-color: #FFF;
	-webkit-box-shadow: none;
	box-shadow: none;
}
button.btn-default:active:hover {
	background-color: #3276B1;
}
/* override Bootstrap excessive button padding */
button.ui-keyboard-button.btn {
	padding: 1px 6px;
}
/* Bootswatch Darkly input is too bright */
.ui-keyboard-input.light, .ui-keyboard-preview.light { color: #222; background: #ddd; }
.ui-keyboard-input.dark, .ui-keyboard-preview.dark { color: #ddd; background: #222; }
</pre>
			<h4>Script</h4>
			<pre class="prettyprint lang-js">$('#inter')
	.keyboard({
		layout: 'international',
		css: {
			// input & preview
			// "label-default" for a darker background
			// "light" for white text
			input: 'form-control input-sm dark',
			// keyboard container
			container: 'center-block well',
			// default state
			buttonDefault: 'btn btn-default',
			// hovered button
			buttonHover: 'btn-primary',
			// Action keys (e.g. Accept, Cancel, Tab, etc);
			// this replaces "actionClass" option
			buttonAction: 'active',
			// used when disabling the decimal button {dec}
			// when a decimal exists in the input area
			buttonDisabled: 'disabled'
		}
	})
	.addTyping();

// Script - typing extension
// simulate typing into the keyboard, use:
// \t or {t} = tab, \b or {b} = backspace, \r or \n or {e} = enter
// added {l} = caret left, {r} = caret right & {d} = delete
$('#inter-type').click(function(){
	$('#inter').getkeyboard().reveal().typeIn("{t}Hal{l}{l}{d}e{r}{r}l'o{b}o {e}{t}World", 500);
	return false;
});</pre>
		</div>
	</div>-->

<!--	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">Alphabetical</span>
		</h2>
		<textarea id="alpha"></textarea>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;textarea id="alpha"&gt;&lt;/textarea&gt;</pre>
			<h4>Script</h4>
			<pre class="prettyprint lang-js">$('#alpha')
	.keyboard({ layout: 'alpha' })
	.addTyping();</pre>
		</div>
	</div>-->

<!--	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">Colemak</span>
		</h2>
		<textarea id="colemak"></textarea>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;textarea id="colemak"&gt;&lt;/textarea&gt;</pre>
			<h4>Script</h4>
			<pre class="prettyprint lang-js">$('#colemak')
	.keyboard({ layout: 'colemak' })
	.addTyping();</pre>
		</div>
	</div>

	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">Dvorak</span>
		</h2>
		<textarea id="dvorak"></textarea>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;textarea id="dvorak"&gt;&lt;/textarea&gt;</pre>
			<h4>Script</h4>
			<pre class="prettyprint lang-js">$('#dvorak')
	.keyboard({ layout: 'dvorak' })
	.addTyping();</pre>
		</div>
	</div>-->


<!--	<div class="block">
		<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">Num Pad</span>
		</h2>
		<input id="num" class="alignRight" type="text">
		<br>
		<small>
			* Input restricted.<br>
			* Pasting (ctrl-v) not allowed.<br>
			* Auto accept content.
		</small>
		<div class="code ui-corner-all">
			<h4>HTML</h4>
			<pre class="prettyprint lang-html">&lt;input id="num" class="alignRight" type="text"&gt;</pre>
			<h4>Script</h4>
			<pre class="prettyprint lang-js">$('#num')
	.keyboard({
		layout : 'num',
		restrictInput : true, // Prevent keys not in the displayed keyboard from being typed in
		preventPaste : true,  // prevent ctrl-v and right click
		autoAccept : true
	})
	.addTyping();</pre>
		</div>
	</div>-->

	

