import React, { useState } from "react";
import { Link } from "@inertiajs/react";
import { useSpring, animated } from "@react-spring/web";
import {
    ArrowDownLeftIcon,
    CogIcon,
    CurrencyDollarIcon,
    FolderIcon,
    HomeIcon,
    UsersIcon,
    DocumentTextIcon,
    PaperClipIcon,
    ExclamationCircleIcon,
} from "@heroicons/react/24/outline";
import ApplicationLogo from "@/Components/ApplicationLogo";
import Modal from "@/Components/Modal";

const navigation = [
    { name: "Dashboard", href: "/dashboard", icon: HomeIcon },
    { name: "Account Settings", href: "/dashboard/settings", icon: CogIcon },
    { name: "Server Config", href: "/dashboard/server-config", icon: CogIcon },
    {
        name: "Billing & Subscription",
        href: "/dashboard/subscription",
        icon: CurrencyDollarIcon,
    },
    {
        name: "Templates",
        href: "#",
        icon: FolderIcon,
        children: [
            { name: "My Templates", href: "/dashboard/email-templates" },
            { name: "All Templates", href: "/dashboard/templates" },
            { name: "Create New", href: "/dashboard/templates/create" },
        ],
    },
    {
        name: "Contacts",
        href: "#",
        icon: UsersIcon,
        children: [
            { name: "All Contacts", href: "/dashboard/contacts" },
            { name: "Add New", href: "/dashboard/contacts/create" },
        ],
    },
    {
        name: "Campaigns",
        href: "#",
        icon: DocumentTextIcon,
        children: [
            { name: "All Campaigns", href: "/dashboard/campaigns" },
            { name: "Create New", href: "/dashboard/campaigns/create" },
        ],
    },
    {
        name: "Reports",
        href: "#",
        icon: PaperClipIcon,
        disabled: true,
        children: [
            { name: "Overview", href: "/dashboard/reports" },
            { name: "Detailed Report", href: "/dashboard/reports/detailed" },
        ],
    },
    {
        name: "Notifications",
        href: "#",
        icon: ExclamationCircleIcon,
        disabled: true,
        children: [
            { name: "All Notifications", href: "/dashboard/notifications" },
            { name: "Settings", href: "/dashboard/notifications/settings" },
        ],
    },
];

export default function DashboardLayout({ children }) {
    const [sidebarOpen, setSidebarOpen] = useState(false);
    const [openSection, setOpenSection] = useState(null);
    const [modalOpen, setModalOpen] = useState(false);

    const sidebarAnimation = useSpring({
        transform: sidebarOpen ? "translateX(0)" : "translateX(-100%)",
        opacity: sidebarOpen ? 1 : 0,
        config: { tension: 250, friction: 20 },
    });

    const sectionAnimation = useSpring({
        opacity: openSection ? 1 : 0,
        height: openSection ? "auto" : "0px",
        config: { tension: 200, friction: 25 },
    });

    const closeModal = () => setModalOpen(false);

    return (
        <div className="h-screen flex overflow-hidden bg-gray-100">
            {/* Sidebar */}
            <animated.div
                style={sidebarAnimation}
                className="fixed inset-0 flex md:hidden z-50"
            >
                <div className="flex flex-col w-64 bg-gray-800 text-white">
                    <div className="flex items-center justify-between px-4 py-4">
                        <img
                            src="/logo.svg"
                            alt="Logo"
                            className="h-8 w-auto"
                        />
                        <button
                            type="button"
                            className="text-gray-400 hover:text-white"
                            onClick={() => setSidebarOpen(false)}
                        >
                            <span className="sr-only">Close sidebar</span>
                            <ArrowDownLeftIcon
                                className="h-6 w-6"
                                aria-hidden="true"
                            />
                        </button>
                    </div>
                    <div className="flex flex-col flex-1 overflow-y-auto">
                        <nav className="mt-5 flex-1 px-2 space-y-1">
                            {navigation.map((item) => (
                                <div key={item.name}>
                                    <Link
                                        href={item.href}
                                        className={`group flex items-center px-2 py-2 text-sm font-medium rounded-md ${
                                            item.disabled
                                                ? "text-gray-500 cursor-not-allowed"
                                                : item.children
                                                ? "text-gray-300"
                                                : "text-gray-300 hover:bg-gray-50 hover:text-gray-900"
                                        }`}
                                        onClick={(e) => {
                                            if (item.disabled) {
                                                e.preventDefault();
                                                setModalOpen(true);
                                            } else if (item.children) {
                                                e.preventDefault(); // Prevent navigation for dropdowns
                                                setOpenSection(
                                                    openSection === item.name
                                                        ? null
                                                        : item.name
                                                );
                                            }
                                        }}
                                    >
                                        <item.icon
                                            className="mr-3 flex-shrink-0 h-6 w-6"
                                            aria-hidden="true"
                                        />
                                        {item.name}
                                        {item.children && (
                                            <svg
                                                className="ml-auto h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M6.293 7.293a1 1 0 011.414 0L10 8.586l2.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clipRule="evenodd"
                                                />
                                            </svg>
                                        )}
                                    </Link>
                                    {item.children &&
                                        openSection === item.name && (
                                            <animated.div
                                                style={sectionAnimation}
                                                className="ml-6 space-y-1"
                                            >
                                                {item.children.map((child) => (
                                                    <Link
                                                        key={child.name}
                                                        href={child.href}
                                                        className="block px-2 py-1 text-sm font-medium rounded-md text-gray-400 hover:bg-gray-700 hover:text-white"
                                                    >
                                                        {child.name}
                                                    </Link>
                                                ))}
                                            </animated.div>
                                        )}
                                </div>
                            ))}
                        </nav>
                    </div>
                </div>
            </animated.div>

            <div className="hidden md:flex md:flex-shrink-0">
                <div className="flex flex-col w-64 bg-gray-800 text-white">
                    <div className="flex items-center justify-between px-4 py-4">
                        <ApplicationLogo className="w-4 h-auto fill-current text-gray-500" />
                    </div>
                    <div className="flex flex-col flex-1 overflow-y-auto">
                        <nav className="mt-5 flex-1 px-2 space-y-1">
                            {navigation.map((item) => (
                                <div key={item.name}>
                                    <Link
                                        href={item.href}
                                        className={`group flex items-center px-2 py-2 text-sm font-medium rounded-md ${
                                            item.disabled
                                                ? "text-gray-500 cursor-not-allowed"
                                                : item.children
                                                ? "text-gray-300"
                                                : "text-gray-300 hover:bg-gray-50 hover:text-gray-900"
                                        }`}
                                        onClick={(e) => {
                                            if (item.disabled) {
                                                e.preventDefault();
                                                setModalOpen(true);
                                            } else if (item.children) {
                                                e.preventDefault(); // Prevent navigation for dropdowns
                                                setOpenSection(
                                                    openSection === item.name
                                                        ? null
                                                        : item.name
                                                );
                                            }
                                        }}
                                    >
                                        <item.icon
                                            className="mr-3 flex-shrink-0 h-6 w-6"
                                            aria-hidden="true"
                                        />
                                        {item.name}
                                        {item.children && (
                                            <svg
                                                className="ml-auto h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M6.293 7.293a1 1 0 011.414 0L10 8.586l2.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clipRule="evenodd"
                                                />
                                            </svg>
                                        )}
                                    </Link>
                                    {item.children &&
                                        openSection === item.name && (
                                            <animated.div
                                                style={sectionAnimation}
                                                className="ml-6 space-y-1"
                                            >
                                                {item.children.map((child) => (
                                                    <Link
                                                        key={child.name}
                                                        href={child.href}
                                                        className="block px-2 py-1 text-sm font-medium rounded-md text-gray-400 hover:bg-gray-700 hover:text-white"
                                                    >
                                                        {child.name}
                                                    </Link>
                                                ))}
                                            </animated.div>
                                        )}
                                </div>
                            ))}
                        </nav>
                    </div>
                </div>
            </div>
            {/* Main content */}
            <div className="flex flex-col w-0 flex-1 overflow-hidden">
                <main>{children}</main>
            </div>

            {/* Modal */}
            <Modal
                show={modalOpen}
                maxWidth="md"
                closeable={true}
                onClose={() => setModalOpen(false)}
            >
                <div className="p-4">
                    <h3 className="text-lg font-semibold text-red-500">Access Restricted</h3>
                    <p className="mt-2 text-white">
                        This page can't be accessed on our beta.
                    </p>
                    <button
                        type="button"
                        className="mt-4 inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700"
                        onClick={() => setModalOpen(false)}
                    >
                        Close
                    </button>
                </div>
            </Modal>
        </div>
    );
}
