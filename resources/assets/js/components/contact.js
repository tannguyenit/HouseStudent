$('#contact').validate({
    rules:{
        name:'required',
        email:{
            required:true,
            email:true
        },
        phone:{
            required:true,
            number:true,
            minlength:10,
            maxlength:11
        },
        subject:'required',
        messages:'required'
    },
    messages:{

    }
})
