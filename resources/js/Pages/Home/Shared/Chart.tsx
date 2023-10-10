import React, {useEffect, useState} from 'react';
import { ApexOptions } from 'apexcharts';
import ReactApexChart from 'react-apexcharts';
import ChartItem from "../../../Models/props_ChartItem";

interface ChartState {
    series: number[];
}

const Chart = ({ plots } : {plots: Array<ChartItem> }) => {
    const [state, setState] = useState<ChartState>({
        series: plots.map(p => p.value)
    });
    const [labels, setLabels] = useState<Array<string>>(plots.map(p => p.label));
    const [colors, setColors] = useState<Array<string>>(plots.map(p => p.color));

    const options: ApexOptions = {
        chart: {
            type: 'donut',
        },
        colors: colors,
        labels: labels,
        legend: {
            show: true,
            position: 'bottom',
        },

        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    background: 'transparent',
                },
            },
        },
        dataLabels: {
            enabled: false,
        },
        responsive: [
            {
                breakpoint: 2600,
                options: {
                    chart: {
                        width: 380,
                    },
                },
            },
            {
                breakpoint: 640,
                options: {
                    chart: {
                        width: 200,
                    },
                },
            },
        ],
    };

    return (
        <div className="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-5">
            <div className="mb-3 justify-between gap-4 sm:flex">
                <div>
                    <h5 className="text-xl font-semibold text-black dark:text-white">
                        Case Analytics
                    </h5>
                </div>
            </div>

            <div className="mb-2">
                <div id="chartThree" className="mx-auto flex justify-center">
                    <ReactApexChart
                        options={options}
                        series={state.series}
                        type="donut"
                    />
                </div>
            </div>

            <div className="-mx-8 flex flex-wrap items-center justify-center gap-y-3">
                {plots.map((plot, index) => {
                    return (
                        <div className="w-full px-8 sm:w-1/2">
                            <div className="flex w-full items-center">
                                <span className="mr-2 block h-3 w-full max-w-3 rounded-full bg-primary" style={{backgroundColor: plot.color}}></span>
                                <p className="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                                    <span> {plot.label} </span>
                                    <span> {plot.percentage}% </span>
                                </p>
                            </div>
                        </div>
                    )
                })}
            </div>
        </div>
    );
}
export default Chart;
