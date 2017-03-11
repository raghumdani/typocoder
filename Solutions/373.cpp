#include <bits/stdc++.h>
using namespace std;
 
int main(){
    int i,j,k,l,m,n,t;
    cin>>t;
    while(t--)
        {
        cin>>n;
        m=1;
        for(i=n;i!=0;i/=10)
            {
            m*=(i%10);
        }
        cout<<m<<endl;
    }
    return 0;
} 