self.addEventListener('message', function(evt) {
	var readyState = evt.data;
	if (readyState < 3) {
		console.log('processing');
		postMessage([ true ]);
	} else {
		console.log('....');
		postMessage([ false ]);
	}
});
