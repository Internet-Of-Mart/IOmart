<div id="my_dataviz"></div>
<script type="module">

    import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";

    let data_ = [
        {value: 15, date: new Date('2023-10-1')},
        {value: 16, date: new Date('2023-10-12')},
        {value: 19, date: new Date('2023-10-13')},
        {value: 25, date: new Date('2023-10-20')}
    ]

    const width = 640;
    const height = 400;
    const marginTop = 20;
    const marginRight = 20;
    const marginBottom = 30;
    const marginLeft = 40;

    const svg = d3.select("#my_dataviz")
        .append("svg")
        .attr("width", width + marginLeft + marginRight)
        .attr("height", height + marginTop + marginBottom)
        .append("g")
        .attr("transform", `translate(${marginLeft},${marginTop})`);

    const x = d3.scaleUtc()
        .domain(d3.extent(data_, d => d.date))
        .range([marginLeft, width - marginRight]);

    // Declare the y (vertical position) scale.
    const y = d3.scaleLinear()
        .domain(d3.extent(data_, d => d.value))
        .range([height - marginBottom, marginTop]);

    svg.append("g")
        .attr("transform", `translate(0,${height - marginBottom})`)
        .call(d3.axisBottom(x));

    // Add the y-axis.
    svg.append("g")
        .attr("transform", `translate(${marginLeft},0)`)
        .call(d3.axisLeft(y));

    svg.selectAll('circle')
        .data(data_, d => d ? d.id : this.id)
        .text(d => d.value)
        .join(
            enter => enter.append("circle"),
            update => update,
            exit => exit.remove()
        )
        .attr("fill", "red")
        .attr("stroke", "black")
        .attr("r", 2)
        .attr("cx", d => x(d.date))
        .attr("cy", d => y(d.value));


</script>
