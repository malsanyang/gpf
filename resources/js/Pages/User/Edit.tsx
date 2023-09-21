import React, { useEffect } from "react";
import Layout from "../../Components/Layout/Layout";
import Breadcrumb from "../../Components/Shared/Breadcrumb";
import UserListProps from "../../Models/props_UserItem";
import { Head, useForm } from "@inertiajs/react";
import RoleListProps from "../../Models/props_RoleItem";

interface UserEditPageProps {
    roles: {data : Array<RoleListProps> },
    user: { data: UserListProps },
    currentUser: { data: UserListProps } | null,
}

const Edit = ({ user, roles, currentUser } : UserEditPageProps) => {
    const { data, setData, put, processing, errors} = useForm({id: '', name: '', email: '', password: '', role: ''});

    useEffect(() => {
        setData({id: user.data.id, name: user.data.name, email: user.data.email, password: '', role: user.data.roleNames});       
    }, [user])

    function handleSubmit(e: any) {
        e.preventDefault();
        put(`/user-management/users/${user.data.id}`);
    }

    return (
        <Layout currentUser={currentUser?.data}>
            <Head title={'User Details'} />

            <Breadcrumb paths={['user-management', 'user-details']} />

            <div className="w-full max-w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div className="max-w-full overflow-x-auto">
                <div className="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <form className="space-y-6" onSubmit={handleSubmit}>
                            <div>
                                <label htmlFor="name" className="mb-2.5 block text-black dark:text-white">Full Name</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="name" value={data.name} autoComplete="name" required onChange={ e => setData('name', e.target.value)}
                                        />
                                </div>
                                { errors && errors.name !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.name}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="email" className="mb-2.5 block text-black dark:text-white">Email address</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="email" type={'email'} value={data.email} autoComplete="email" required onChange={ e => setData('email', e.target.value)}
                                        />
                                </div>
                                { errors && errors.email !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.email}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="password" className="mb-2.5 block text-black dark:text-white">Password</label>
                                <div className="mt-2">
                                    <input className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="password" type="password" value={data.password} autoComplete="password" required onChange={ e => setData('password', e.target.value)}
                                        />
                                </div>
                                { errors && errors.password !== undefined && (
                                    <div className="flex justify-between">
                                        <p className="w-full text-sm text-danger">{errors.password}</p>
                                    </div>
                                )}
                            </div>

                            <div>
                                <label htmlFor="role" className="mb-2.5 block text-black dark:text-white">Role</label>
                                <div className="mt-2">
                                    <select className="w-full rounded border-[1.5px] border-stroke bg-white py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        id="role" value={data.role} autoComplete="role" required onChange={ e => setData('role', e.target.value)}
                                        >
                                        <option value={''}>Please select a role</option>
                                        { roles.data.map((role, index) => {
                                            return (<option value={role.name} key={index}>{role.name}</option>)
                                        })}
                                    </select>
                                    { errors && errors.role !== undefined && (
                                        <div className="flex justify-between">
                                            <p className="w-full text-sm text-danger">{errors.role}</p>
                                        </div>
                                    )}
                                </div>
                            </div>

                            <div>
                                <button type="submit" disabled={processing}
                                        className="flex w-full inline-flex items-center justify-center rounded-md bg-primary py-4 px-10 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Layout>
    )
};

export default Edit;
