function validateCreateEvent(form)
{
    var valid = true;


    // validate that all values entered
    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++)
    {
        if (form[i].value === "")
        {
            spanElements[i].innerHTML = "value must not be empty";
            valid = false;
        }
        else
            spanElements[i].innerHTML = "";
    }

    var title = form['Title'].value;
    if (title.length < 2)
    {
        var spanElement = document.getElementById("titleError");
        spanElement.innerHTML = "Title too short";
        valid = false;
    }
    if (title.length > 20)
    {
        var spanElement = document.getElementById("titleError");
        spanElement.innerHTML = "Title too long";
        valid = false;
    }

    var description = form['Description'].value;
    if (description.length < 2)
    {
        var spanElement = document.getElementById("descriptionError");
        spanElement.innerHTML = "Description too short";
        valid = false;
    }
    if (description.length > 20)
    {
        var spanElement = document.getElementById("descriptionError");
        spanElement.innerHTML = "Description too long";
        valid = false;
    }

    var time = form['Time'].value;
    if (time.length != 5 || time.substr(2, 1) != ':')
    {
        var spanElement = document.getElementById("timeError");
        spanElement.innerHTML = "Invalid time. Must be in 24 hour format including ':'";
        valid = false;
    }
    else
    {
        var hour = time.substr(0, 2);
        var min = time.substr(4, 5);
        if (hour > 23 || hour < 0 || min > 59 || min < 0)
        {
            var spanElement = document.getElementById("timeError");
            spanElement.innerHTML = "Invalid time";
            valid = false;
        }
    }

    //validate capacity
    var capacity = form['MaxCapacity'].value;
    if (capacity < 100)
    {
        var spanElement = document.getElementById("maxCapacityError");
        spanElement.innerHTML = "Event capacity too small";
        valid = false;
    }

    if (capacity > 150000)
    {
        var spanElement = document.getElementById("maxCapacityError");
        spanElement.innerHTML = "Event capacity too large";
        valid = false;
    }

    var startDate = form['StartDate'].value;
    if (startDate.length != 10 || startDate.substr(4, 1) != "-" || startDate.substr(7, 1) != '-')
    {
        var spanElement = document.getElementById("startDateError");
        spanElement.innerHTML = "Invalid Date. Must be in format of yyyy/mm/dd";
        valid = false;
    }
    else
    {
        var year = startDate.substr(0, 4);
        var month = startDate.substr(5, 2);
        var day = startDate.substr(8, 2);
        if (year >= 2017 || year < 2015 || month > 12 || month < 1 || day > 31 || day < 1)
        {
            var spanElement = document.getElementById("startDateError");
            spanElement.innerHTML = "Invalid Date, we are currently only organising events for 2015 and 2016";
            valid = false;
        }
    }

    var endDate = form['EndDate'].value;
    if (endDate.length != 10 || endDate.substr(4, 1) != "-" || endDate.substr(7, 1) != '-')
    {
        var spanElement = document.getElementById("endDateError");
        spanElement.innerHTML = "Invalid Date. Must be in format of yyyy/mm/dd";
        valid = false;
    }
    else
    {
        var year = endDate.substr(0, 4);
        var month = endDate.substr(5, 2);
        var day = endDate.substr(8, 2);
        if (year >= 2017 || year < 2015 || month > 12 || month < 1 || day > 31 || day < 1)
        {
            var spanElement = document.getElementById("endDateError");
            spanElement.innerHTML = "Invalid Date, we are currently only organising events for 2015 and 2016";
            valid = false;
        }
    }

    var price = form['Price'].value;
    if (price < 5)
    {
        var spanElement = document.getElementById("priceError");
        spanElement.innerHTML = "Minimum price is €5";
        valid = false;
    }
    if (price > 1000)
    {
        var spanElement = document.getElementById("priceError");
        spanElement.innerHTML = "Maximum price is €1000";
        valid = false;
    }


    // validate email address
    //var email = form['email'].value;
    //var atpos = email.indexOf("@");
    //var dotpos = email.lastIndexOf(".");
    //if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length)
    // {
    //   var spanElement = document.getElementById("emailError");
    // spanElement.innerHTML = "Invalid email address";
    //valid = false;
    //}


    //var number = form['mobile'].value;
    //if (number.length !== 10 && number.length !== 7)
    //{
    //    var spanElement = document.getElementById("mobileError");
    //   spanElement.innerHTML = "Number must be 7 or 10 digits long";   
    //   valid = false;
    // }



    return valid;
}

