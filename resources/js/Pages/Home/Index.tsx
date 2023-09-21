import React from "react";
import Layout from "../../Components/Layout/Layout";
import {Head} from "@inertiajs/react";
import UserListProps from "../../Models/props_UserItem";

interface HomeIndexPageProps {
    currentUser: { data: UserListProps } | null,
}

const Index = ({ currentUser } : HomeIndexPageProps) =>{
    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Dashboard'} />

            <div className="container">

            </div>
        </Layout>
    )
};

export default Index;

