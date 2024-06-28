// ServicingScreen
import React from "react";
import { View, Text, StyleSheet, Button } from "react-native";
import { useNavigation } from "@react-navigation/native";

const ServicingScreen = () => {
  const navigation = useNavigation();
  return (
    <View style={styles.container}>
      <Text>Servicing Screen</Text>
      <Button title="Go to Building" onPress={() => navigation.navigate("Building" as never)} />
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
  },
});

export default ServicingScreen;