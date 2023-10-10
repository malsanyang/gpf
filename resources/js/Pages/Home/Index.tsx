import React from "react";
import Layout from "../../Components/Layout/Layout";
import {Head} from "@inertiajs/react";
import UserListProps from "../../Models/props_UserItem";
import Card from "./Shared/Card";
import CardItem from "../../Models/props_CardItem";
import Chart from "./Shared/Chart";
import ChartItem from "../../Models/props_ChartItem";

interface HomeIndexPageProps {
    currentUser: { data: UserListProps } | null,
    cards: Array<CardItem>,
    plots: Array<ChartItem>,
}

const Index = ({ currentUser, cards, plots } : HomeIndexPageProps) =>{
    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Dashboard'} />

            <div className="container">
                <div className="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
                    { cards.map((card, index) => {
                       return (<Card key={index} card={card}></Card>)
                    })}
                </div>

                <div className="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
                    <Chart plots={plots}></Chart>
                </div>
            </div>
        </Layout>
    )
};

export default Index;

