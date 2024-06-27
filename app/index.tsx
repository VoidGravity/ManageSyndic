import React from "react";
import { Image, Text, View } from "react-native";
import Header from "./components/Header";
import Login from "./screens/Login";

const App = () => {
  return (
    <View style={styles.app}>
      <Login />
    </View>
  );
};

const styles = {
  app: {
    backgroundColor: "#000",
    width: "100%",
    height: "100%",
  },
};
export default App;
