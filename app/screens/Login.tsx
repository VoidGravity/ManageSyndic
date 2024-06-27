import React from "react";
import { Image, Text, View } from "react-native";

const Login = () => {
  return (
    <React.Fragment>
      <View style={styles.screen}>
        <View style={styles.header}>
          <View>
          {/* User photo */}
          <Image
            style={styles.logo}
            source={require("../../assets/images/react-logo.png")}
          />
          </View>
          <View>
              {/* Logo */}
          <Image
            style={styles.logo}
            source={require("../../assets/images/react-logo.png")}
          />
          </View>
          <View>
            {/* User photo */}
          <Image
            style={styles.logo}
            source={require("../../assets/images/react-logo.png")}
          />
          </View>
        </View>
      </View>
      <Text>Login</Text>
    </React.Fragment>
  );
};

const styles = {
  screen: {
    backgroundColor: "#fcfcfc",
    width: "100%",
    height: "100%",
  },
  logo: {
    width: 50,
    height: 60,
    maxHeight: "80%",
  },
  header: {
    backgroundColor: "#fcfcfc",
    color: "white",
    padding: 10,
    textAlign: "center",
    with: "100%",
    display: "flex",
    flexDirection: "row",
    justifyContent: "space-between",
    height: 70,
    boxShadow: "0 0 10px rgba(0, 0, 0, 0.1)",
  },
};

export default Login;
