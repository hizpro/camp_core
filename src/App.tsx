import { useState } from 'react';
import Navbar from './components/Navbar';
import Hero from './components/Hero';
import About from './components/About';
import Programs from './components/Programs';
import Timeline from './components/Timeline';
import Requirements from './components/Requirements';
import RegistrationForm from './components/RegistrationForm';
import FAQ from './components/FAQ';
import Footer from './components/Footer';

function App() {
  const [activeSection, setActiveSection] = useState('home');

  return (
    <div className="min-h-screen bg-white font-sans">
      <Navbar activeSection={activeSection} setActiveSection={setActiveSection} />
      <Hero />
      <About />
      <Programs />
      <Timeline />
      <Requirements />
      <RegistrationForm />
      <FAQ />
      <Footer />
    </div>
  );
}

export default App;
