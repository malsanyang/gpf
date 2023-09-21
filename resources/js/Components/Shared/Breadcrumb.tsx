import React from "react";
import { Link } from "@inertiajs/react";

interface BreadcrumbProps {
    paths: Array<string>;
}
const Breadcrumb = ({ paths }: BreadcrumbProps) => {
    const pathToDisplay = (path: string|null|undefined): string =>  {
        if (path === undefined || path === null) {
            return '';
        }

        return path.toLowerCase().split('-').map((word) => {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }).join(' ');
    }

    const pageName = pathToDisplay(paths.pop());

    return (
        <div className="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 className="text-title-md2 font-semibold text-black dark:text-white">
                {pageName}
            </h2>

            <nav>
                <ol className="flex items-center gap-2">
                    <li>
                        <Link href="/">Dashboard /</Link>
                    </li>
                    { paths.map(function (path, index){
                        return <Link href={`/${path}`} key={index}>{pathToDisplay(path)} /</Link>
                    })}
                    <li className="text-primary">{pageName}</li>
                </ol>
            </nav>
        </div>
    )
};

export default Breadcrumb;
