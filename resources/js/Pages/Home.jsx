import React from "react";
import { Head } from "@inertiajs/react";
import FrontendLayout from "@/Layouts/FrontendLayout";

export default function Home() {
    return (
        <FrontendLayout>
            <Head>
                <title>Your page title</title>
                <meta name="description" content="Your page description" />
            </Head>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1 className="text-3xl font-bold text-gray-900">
                        Welcome to Our Website
                    </h1>
                    <p className="mt-4 text-lg text-gray-500">
                        This is the home page of our website. Feel free to
                        explore!
                    </p>
                </div>
            </div>
        </FrontendLayout>
    );
}
