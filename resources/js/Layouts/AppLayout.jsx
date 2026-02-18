import Header from "@/Components/Header";
import Footer from "@/Components/Footer";

const AppLayout = ({ children }) => {
    return (
        <>
            <Header />
            {children}
            <Footer />
        </>
    );
};

export default AppLayout;
