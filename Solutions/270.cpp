#include <bits/stdc++.h>
using namespace std;
int main() { 
    int t;
    cin>>t;
    while(t--)
    {   int sum=0;
        char a[20000],b[20000];
        scanf("%s%s",a,b);
        for(int i=0;a[i]!='\0';i++)
        {
            sum+=abs(a[i]-b[i]);
        }
        cout<<sum<<endl;
    }
	return(0);
}