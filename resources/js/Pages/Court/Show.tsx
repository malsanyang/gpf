import React from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import {Head} from "@inertiajs/react";
import CourtListProps from "../../Models/props_CourtItem";

interface CourtShowPageProps {
    data: CourtListProps,
    currentUser: { data: UserListProps } | null,
}

const Show = ({ data, currentUser } : CourtShowPageProps) => {
    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Court Details'} />

            <Breadcrumb paths={['courts', 'details']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <table className="w-full table-auto">
                        <tbody>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Court No.</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.courtNo}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Name</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.name}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Location</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.location}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </Layout>
    )
};

export default Show;
