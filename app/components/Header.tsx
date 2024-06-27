import React from "react";
import { Text } from "react-native";

const Header = () => {
  return <React.Fragment><Text style={{...styles.header}} >Header</Text></React.Fragment>;
};


const styles = {
    header: {
        backgroundColor: "blue",
        color: "white",
        padding: 10,
        textAlign: "center",
        with: "100%",
    },
};

export default Header;