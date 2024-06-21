const onee = document.getElementById('one_one');
const twoo = document.getElementById('one_two');
const threee = document.getElementById('one_three');
const fourr = document.getElementById('one_four');
const fivee = document.getElementById('two_one');
const sixx = document.getElementById('two_two');
const sevenn = document.getElementById('two_three');
const eightt = document.getElementById('two_four');
const Container = document.getElementById('container');
const arrayy = [onee, twoo, threee, fourr, fivee, sixx, sevenn, eightt];
let z;

arrayy.forEach((element) => {
    element.onclick = () => {
        console.log(element.id);
        const x = document.getElementsByClassName('' + element.id);
        if (element.id == "one_one") {
            z = "Apie";
        }
        else if (element.id == "one_two") {
            z = "Flyhigh";
        }
        else if (element.id == "one_three") {
            z = "Toyoko";
        }
        else if (element.id == "one_four") {
            z = "Dragonball";
        }
        else if (element.id == "two_one") {
            z = "Pandas";
        }
        else if (element.id == "two_two") {
            z = "Souls";
        }
        else if (element.id == "two_three") {
            z = "MyWhey";
        }
        else if (element.id == "two_four") {
            z = "FinePine";
        } else {
            z = "hello";
        }

        console.log(z);
        // window.location.href = "buy.html";
        // TODO: add logic for handling div elements
        function toggle_Clock() {
            console.log("yes its getting done");
            // get the clock
            var my_Clock = document.getElementById('containerr');

            // get the current value of the clock's display property
            var display_Setting = my_Clock.style.display;

            // also get the clock button, so we can change what it says
            //var clockButton = document.getElementById('clockButton');

            // now toggle the clock and the button text, depending on current state
            if (display_Setting == 'block') {
                // clock is visible. hide it
                my_Clock.style.display = 'none';

                // change button text
                //  clockButton.innerHTML = 'Show clock';
            }
            else {
                // clock is hidden. show it
                my_Clock.style.display = 'block';
                Container.style.display = 'none';
                // change button text
                // clockButton.innerHTML = 'Hide clock';
            }
        }
        toggle_Clock();
        document.getElementById("coupon_name").value = z;
    };
});

function cancelButton() {
    var my_Clock = document.getElementById('containerr');
    my_Clock.style.display = 'none';
    Container.style.display = 'block';
}

cancelButton();

