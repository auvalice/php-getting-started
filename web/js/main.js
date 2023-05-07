const chart_element = document.getElementById("insurance_data");

async function get_data() {
    const response = await fetch("http://localhost/api/persons?fields=ID,RED_CAR,CLM_FREQ", {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return response.json();
}

let claim_frequencies;
let chart;


get_data().then((data) => {
    console.log({ data });

    claim_frequencies = [0, 0, 0];

    data.forEach(datapoint => {
        claim_frequencies[datapoint.CLM_FREQ] += 1;
    });

    console.log({ claim_frequencies });

    chart = new Chart(chart_element, {
        type: 'bar',
        data: {
            labels: ["Zero", "Once", "Twice"],
            datasets: [{
                label: "Claim frequency",
                data: claim_frequencies
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});