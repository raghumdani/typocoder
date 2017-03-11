#include <stdio.h> 

main()
{ 
    int num,n,i,prod,rem=0;
    
    printf("\nEnter number of test cases");
    scanf("%d",&n);
    
    for(i=0;i<n;++i)
    {
        scanf("%d\n",&num);
        prod=1;
        
        while(num!=0)
        {
            rem=num%10;
            prod=prod*rem;
            num=num/10;
        }
        
        printf("%d\n",prod);
    }
}