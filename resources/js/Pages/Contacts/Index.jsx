import React from "react";
import { usePage, useForm } from "@inertiajs/react";
import { useSpring, animated } from "react-spring";
import DashboardLayout from "../../Layouts/DashboardLayout";

const Index = () => {
    const { contacts } = usePage().props;
    const [props, set] = useSpring(() => ({ opacity: 0 }));
    const {
        data,
        setData,
        post,
        delete: destroy,
        progress,
    } = useForm({
        file: null,
    });

    React.useEffect(() => {
        set({ opacity: 1 });
    }, [set]);

    const handleBulkUpload = (e) => {
        e.preventDefault();
        if (data.file) {
            console.log("File selected:", data.file);
            console.log("File type:", data.file.type); // Log the MIME type

            post("/dashboard/contacts/bulk-upload", {
                data: { file: data.file },
                forceFormData: true, // Ensure FormData conversion
                onSuccess: () => {
                    window.location.reload();
                },
                onError: (errors) => {
                    console.error(errors);
                },
            });
        } else {
            console.error("No file selected.");
        }
    };


    const handleExport = () => {
        window.location.href = "/dashboard/contacts/export";
    };

    const handleDelete = (contactId) => {
        if (confirm("Are you sure you want to delete this contact?")) {
            destroy(`/dashboard/contacts/${contactId}`, {
                onSuccess: () => window.location.reload(),
                onError: (error) => console.error(error),
            });
        }
    };

    const pagination = contacts.meta || {};
    const prevPageUrl = pagination.prev_page_url || "#";
    const nextPageUrl = pagination.next_page_url || "#";
    const hasMorePages = Boolean(nextPageUrl);

    return (
        <DashboardLayout>
            <animated.div
                style={props}
                className="p-6 bg-white shadow-md rounded-lg"
            >
                <h1 className="text-2xl font-semibold">Contacts</h1>
                <button
                    onClick={handleExport}
                    className="mt-4 p-2 bg-blue-500 text-white rounded"
                >
                    Export Contacts
                </button>
                <form onSubmit={handleBulkUpload}>
                    <input
                        type="file"
                        name="file"
                        accept=".xlsx, .csv"
                        onChange={(e) => setData("file", e.target.files[0])}
                    />
                    <button
                        type="submit"
                        className="mt-2 p-2 bg-green-500 text-white rounded"
                    >
                        Upload Bulk Contacts
                    </button>
                </form>
                {progress && (
                    <progress value={progress.percentage} max="100">
                        {progress.percentage}%
                    </progress>
                )}
                <table className="mt-4 w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th className="border border-gray-300 px-4 py-2">ID</th>
                            <th className="border border-gray-300 px-4 py-2">First Name</th>
                            <th className="border border-gray-300 px-4 py-2">Last Name</th>
                            <th className="border border-gray-300 px-4 py-2">Email</th>
                            <th className="border border-gray-300 px-4 py-2">Phone</th>
                            <th className="border border-gray-300 px-4 py-2">Address</th>
                            <th className="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {contacts.data.map((contact) => (
                            <tr key={contact.id}>
                                <td className="border border-gray-300 px-4 py-2">{contact.id}</td>
                                <td className="border border-gray-300 px-4 py-2">{contact.first_name}</td>
                                <td className="border border-gray-300 px-4 py-2">{contact.last_name}</td>
                                <td className="border border-gray-300 px-4 py-2">{contact.email}</td>
                                <td className="border border-gray-300 px-4 py-2">{contact.phone}</td>
                                <td className="border border-gray-300 px-4 py-2">{contact.address}</td>
                                <td className="border border-gray-300 px-4 py-2">
                                    <a
                                        href={`/dashboard/contacts/${contact.id}/edit`}
                                        className="text-blue-500"
                                    >
                                        Edit
                                    </a>
                                    <button
                                        onClick={() => handleDelete(contact.id)}
                                        className="text-red-500 ml-4"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
                <div className="mt-4 flex justify-between">
                    {pagination.current_page > 1 && (
                        <button
                            onClick={() => (window.location.href = prevPageUrl)}
                            className="p-2 bg-gray-500 text-white rounded"
                        >
                            Previous
                        </button>
                    )}
                    {hasMorePages && (
                        <button
                            onClick={() => (window.location.href = nextPageUrl)}
                            className="p-2 bg-gray-500 text-white rounded"
                        >
                            Next
                        </button>
                    )}
                </div>
            </animated.div>
        </DashboardLayout>
    );
};

export default Index;
