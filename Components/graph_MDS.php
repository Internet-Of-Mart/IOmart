<?php /** @var Array $element */?>
<?php /** @var String $yAxisLabel */?>


<div class="graph_window">
    <div id="my_dataviz"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module">
        import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";

        let data_ = (<?php echo json_encode($element)?>)
            .map(e => {
                e = JSON.parse(e)
                e.date = new Date(e.date)
                return e
            })

        let sumstat = d3.group(data_, d => d.name)

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

        //Add the x-axis
        svg.append("g")
            .attr("transform", `translate(0,${height - marginBottom})`)
            .call(d3.axisBottom(x));

        //Add the x-axis label
        svg.append("text")
            .text("Date")
            .style("text-anchor", "middle")
            .style("fill", "black")
            .attr("x", width / 2)
            .attr("y", height)

        // Add the y-axis
        svg.append("g")
            .attr("transform", `translate(${marginLeft},0)`)
            .call(d3.axisLeft(y));

        //Add the y-axis label
        svg.append("text")
            .text("<?php echo $yAxisLabel?>")
            .attr("transform", "rotate(-90)")
            .style("text-anchor", "start")
            .style("fill", "black")
            .attr("y", 0)
            .attr("x", 0 - (height / 2))


        const color = d3.scaleOrdinal()
            .range(['#e41a1c', '#377eb8', '#4daf4a', '#984ea3', '#ff7f00', '#ffff33', '#a65628', '#f781bf', '#999999'])

        // Draw the line
        svg.selectAll(".line")
            .data(sumstat)
            .join(
                enter => (
                    enter.append('path')
                        .attr("fill", "none")
                        .attr("stroke", (d) => color(d[0]))
                        .attr("stroke-width", 1.5)
                        .attr("d", (d) =>
                            d3.line()
                                .x((d) => x(d.date))
                                .y((d) => y(d.value))
                                (d[1])
                        )
                ),

                update => (
                    update.attr("fill", "none")
                        .attr("stroke", (d) => color(d[0]))
                        .attr("stroke-width", 1.5)
                        .attr("d", (d) =>
                            d3.line()
                                .x((d) => x(d.date))
                                .y((d) => y(d.value))
                                (d[1])
                        )
                ),
                exit => (exit.remove())
            )

        $(document).ready(
            () => {
                for (let key of sumstat.keys()) { // Using the default iterator (could be `map.entries()` instead)
                    let IDkey = key.replace(' ', '-')
                    $(".graph_window")
                        .after($("<div/>", {class: "store_index_container", id: `${IDkey}`}))
                        .promise()
                        .done(() => {
                            $(`#${IDkey}`)
                                .append($("<div/>", {class: "color_box", style: `background-color: ${color(key)};`}))
                                .append($("<a/>", {text: `${key}`}))
                        })

                }
            }
        )

    </script>
</div>