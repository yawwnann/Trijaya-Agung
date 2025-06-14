import React from "react";
import { Navbar, NavBody, NavItems, NavbarButton } from "./components/Navbar";
import HeroSection from "./components/HeroSection";
import StatsSection from "./components/StatsSection";
import ProductHighlight from "./components/ProductHighlight";
import { InfiniteMovingCardsDemo } from "./components/TestimonialSection";
import ReviewAction from "./components/ReviewAction";
import FooterSection from "./components/FooterSection";
import WhatsappButton from "./components/WhatsappButton";

const HomeView: React.FC = () => {
  return (
    <div>
      <Navbar className="mt-6 ">
        <NavBody className="px-10">
          <span className="text-blue-600 font-bold text-lg">TriJaya Agung</span>
          <NavItems
            items={[
              { name: "Beranda", link: "#" },
              { name: "Tentang Kami", link: "#" },
              { name: "Produk", link: "#" },
            ]}
            className="ml-8"
          />
          <div className="ml-auto">
            <NavbarButton href="#" className="font-bold">
              Hubungi Kami
            </NavbarButton>
          </div>
        </NavBody>
      </Navbar>
      <HeroSection />
      <StatsSection />
      <ProductHighlight />
      <InfiniteMovingCardsDemo />
      <ReviewAction />
      <FooterSection />
      <WhatsappButton />
    </div>
  );
};

export default HomeView;
