// Breadcrumb

import React from "react";
import { Text, View } from "react-native";
import { Link } from "@react-navigation/native";
import { Colors } from "@/constants/Colors";
import { FaArrowLeft } from "react-icons/fa";

const Breadcrumb = () => {
  return (
    <View
      style={{
        marginBottom: 20,
        display: "flex",
        flexDirection: "row",
        justifyContent: "space-between",
        alignItems: "center",
        width: "100%",
      }}
    >
      {/* Go Back */}

      <FaArrowLeft title="Back" />
      {/* Title */}
      <View style={{
        display: "flex",
        flexDirection: "row",
        justifyContent: "center",
        alignItems: "center",
        gap: 5,
      }}>
        <Link to="/">
          <Text style={{
            color: Colors.bodyColor,
            fontSize: 16,
            fontWeight: "bold",
          }}>Home</Text>
        </Link>
        <Text style={{
            color: Colors.bodyColor,
            fontSize: 16,
            fontWeight: "bold",
          }}> / </Text>
        <Link to="/settings">
          <Text style={{
            color: Colors.bodyColor,
            fontSize: 16,
            fontWeight: "bold",
          }}>Settings</Text>
        </Link>
      </View>
    </View>
  );
};

export default Breadcrumb;
