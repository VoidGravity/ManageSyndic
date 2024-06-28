import React from "react";
import { NavigationContainer } from "@react-navigation/native";
import DrawerNavigation from "./components/DrawerNavigation";
import { View } from "react-native";
import { Colors } from "@/constants/Colors";

const index = () => {
  return (
    <View style={styles.app}>
      <NavigationContainer independent={true}>
        <DrawerNavigation />
      </NavigationContainer>
    </View>
  );
};

const styles:any = {
  app: {
    backgroundColor: Colors.bodyBg,
    color: Colors.bodyColor,
    with: "100%",
    height: "100%",
  },
};
export default index;
