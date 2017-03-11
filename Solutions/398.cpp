#include<bits/stdc++.h>
using namespace std;

int main()

{

    int t, n;
    
    scanf("%d", &t);
    
    while(t--)
    
    {
        
        int pro = 1;
        
        scanf("%d", &n);
        
        while(n!=0)
        {
            
            pro = pro*(n%10);
            
            n/=10;
            
        }
        
        printf("%d\n", pro);
        
    }

return 0;

}
