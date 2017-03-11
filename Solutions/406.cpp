#include <iostream>
using namespace std;

#include <stdio.h> 

int main() { 
    int t=0;
    cin>>t;
    while(t--)
    {
        long int a=0;
        cin>>a;
       
        if(a==0)
        cout<<"0\n";
        else{
             int b=1;
            while(a!=0)
            {
              b=b*(a%10);
              a=a/10;
            }
            cout<<b;
        cout<<"\n";
        }
        
    }
	return(0);
}