function changeResultsPerPage(resultsPerPage) {
    var url = new URL(window.location.href);
    url.searchParams.set('resultsPerPage', resultsPerPage.value);
	window.location.href = url.href;
}

function changeKeywords() {
    var url = new URL(window.location.href);
    keywords = $('#keywords').value;
    url.searchParams.set('keywords', keywords);
	window.location.href = url.href;
}

function changePage(page) {
    var url = new URL(window.location.href);
    url.searchParams.set('page', page);
	window.location.href = url.href;
}

function changeCondition(condition) {
    var url = new URL(window.location.href);
    url.searchParams.set('condition', condition.value);
	window.location.href = url.href;
}

function changeYear(year) {
    var url = new URL(window.location.href);
    url.searchParams.set('year', year.value);
	window.location.href = url.href;
}

function changeMake(make){
    var url = new URL(window.location.href);
    url.searchParams.set('page', 1);
    url.searchParams.delete('model');
    url.searchParams.set('make', make.value);
	window.location.href = url.href;
}

function changeColor(color){
    var url = new URL(window.location.href);
    url.searchParams.set('color', color.value);
	window.location.href = url.href;
}

function changeModel(model){
    var url = new URL(window.location.href);
    url.searchParams.set('page', 1);
    url.searchParams.set('model', model.value);
    window.location.href = url.href;
}

function resetFilters(){
    var url = new URL(window.location.href);
    url.searchParams.set('page', 1);
    url.searchParams.delete('year');
    url.searchParams.delete('model');
    url.searchParams.delete('make');
    url.searchParams.delete('color');
    url.searchParams.delete('keywords');
	window.location.href = url.href;
}