import React from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import {Head} from "@inertiajs/react";
import CriminalListProps from "../../Models/props_CriminalItem";

interface CriminalShowPageProps {
    data: CriminalListProps,
    currentUser: { data: UserListProps } | null,
}

const Show = ({ data, currentUser } : CriminalShowPageProps) => {
    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'Criminal Details'} />

            <Breadcrumb paths={['criminals', 'details']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                    <table className="w-full table-auto">
                        <tbody>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">First Name</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.firstName}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Last Name</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.lastName}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Address</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.address}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">Telephone No.</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{data.telephoneNo}</p>
                            </td>
                        </tr>
                        <tr>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">DOB</p>
                            </td>
                            <td className="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <p className="text-black dark:text-white">{new Date(data.dob).toLocaleDateString()}</p>
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
