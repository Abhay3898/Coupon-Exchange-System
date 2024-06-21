
const one = document.getElementById('one-one');
const two = document.getElementById('one-two');
const three = document.getElementById('one-three');
const four = document.getElementById('one-four');
const five = document.getElementById('two-one');
const six = document.getElementById('two-two');
const seven = document.getElementById('two-three');
const eight = document.getElementById('two-four');
const container = document.getElementById('container');
const footer = document.getElementById('footer');

const array = [one, two, three, four, five, six, seven, eight];
let y;

array.forEach((element) => {
    element.onclick = () => {
        console.log(element.id);
        const x = document.getElementsByClassName('' + element.id);
        if (element.id == "one-one") {
            y = "Apie";
        }
        else if (element.id == "one-two") {
            y = "Flyhigh";
        }
        else if (element.id == "one-three") {
            y = "Toyoko";
        }
        else if (element.id == "one-four") {
            y = "Dragonball";
        }
        else if (element.id == "two-one") {
            y = "Pandas";
        }
        else if (element.id == "two-two") {
            y = "Souls";
        }
        else if (element.id == "two-three") {
            y = "MyWhey";
        }
        else if (element.id == "two-four") {
            y = "FinePine";
        } else {
            y = "hello";
        }
        console.log(y);
        // window.location.href = "buy.html";
        // TODO: add logic for handling div elements
        function toggleClock() {
            console.log("yes its getting done");
            // get the clock
            var myClock = document.getElementById('hidden');

            // get the current value of the clock's display property
            var displaySetting = myClock.style.display;

            // also get the clock button, so we can change what it says
            //var clockButton = document.getElementById('clockButton');

            // now toggle the clock and the button text, depending on current state
            if (displaySetting == 'block') {
                // clock is visible. hide it
                myClock.style.display = 'none';

                // change button text
                //  clockButton.innerHTML = 'Show clock';
            }
            else {
                // clock is hidden. show it
                myClock.style.display = 'block';
                container.style.display = 'none';
		footer.style.display = 'none';
                // change button text
                // clockButton.innerHTML = 'Hide clock';
            }
        }
        toggleClock();
        document.getElementById("myVariableInput").value = y;
    };
});

function cancel_button() {
    var my_Clock = document.getElementById('hidden');
    my_Clock.style.display = 'none';
    Container.style.display = 'block';
}

cancel_button();

