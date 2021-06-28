//event pada link

$('.halaman').on('click', function(e){

	//ambil isi href atau link
	var tujuan = $(this).attr('href');
	//tangkap elemen yg bersangkutan
	var elemenTujuan = $(tujuan);
	//
	//console.log($('body').scrollTop());
	//console.log(elemenTujuan.offset().top);


	//pindah scroll
	$('html, body').animate({
		scrollTop: elemenTujuan.offset().top - 74 //jarak buat atas dari masing2 fitur
	}, 1200, "easeInOutExpo"); //satuan milisecond
	e.preventDefault();

});

//parallax
$(window).scroll(function(){
	var wScroll = $(this).scrollTop();

$('.jumbotron img').css({
	'transform' : 'translate(0px, '+ wScroll/4 +'%)'
});

$('.jumbotron h1').css({
	'transform' : 'translate(0px, '+ wScroll/2 +'%)'
});

$('.jumbotron p').css({
	'transform' : 'translate(0px, '+ wScroll/1.2 +'%)'
});

});


//js checkbook 1
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll2").prop("checked", false);
		}
	});
});

//checkbox
$("#checkAll").click(function () {
    $(".checkbox").prop('checked', $(this).prop('checked'));
});

//checkbox2
$("#checkAll2").click(function () {
    $(".checkbox2").prop('checked', $(this).prop('checked'));
});

//checkbox3
$("#checkAll3").click(function () {
    $(".checkbox3").prop('checked', $(this).prop('checked'));
});

//checkbox4
$("#checkAll4").click(function () {
    $(".checkbox4").prop('checked', $(this).prop('checked'));
});

//checkbox5
$("#checkAll5").click(function () {
    $(".checkbox5").prop('checked', $(this).prop('checked'));
});

//checkbox6
$("#checkAll6").click(function () {
    $(".checkbox6").prop('checked', $(this).prop('checked'));
});

//checkbox7
$("#checkAll7").click(function () {
    $(".checkbox7").prop('checked', $(this).prop('checked'));
});

//checkbox8
$("#checkAll8").click(function () {
    $(".checkbox8").prop('checked', $(this).prop('checked'));
});

//checkbox9
$("#checkAll9").click(function () {
    $(".checkbox9").prop('checked', $(this).prop('checked'));
});

//checkbox10
$("#checkAll10").click(function () {
    $(".checkbox10").prop('checked', $(this).prop('checked'));
});

//dropdown
$('.dropdown-toggle').dropdown()

//upload
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

 //upload 2
 $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Pilih File"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:300
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Pilih File");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
//sidebar
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

